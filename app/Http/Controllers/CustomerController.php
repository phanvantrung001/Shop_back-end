<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',Customer::class);

        $customers = Customer::get();
        return view('admin.customers.index', compact('customers'));
    }
    public function destroy(string $id){
        $this->authorize('delete', Customer::class);

        $customers = Customer::find($id);
        $customers->delete();
        alert()->success('Khách hàng đã được đưa vào thùng rác!');
        return redirect()->route('customer.index');

    }
    public function trash()
    {
        try {
            $softs = Customer::onlyTrashed()->get();
            return view('admin.categories.trash', compact('softs'));
        } catch (\Exception $e) {
            alert()->warning('Lỗi');
            return back();
        }
    }
    public function restore($id)
    {
        $this->authorize('restore', Customer::class);

        try {
            $softs = Customer::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi Phục thành công');
            return redirect()->route('Customer.index');
        } catch (\Exception $e) {
            alert()->warning('Lỗi');
            return redirect()->route('Customer.index');
        }
    }
     //xóa vĩnh viễn
     public function deleteforever($id)
     {
        $this->authorize('forceDelete', Customer::class);
        try {
            $softs = Customer::withTrashed()->find($id);
            $softs->forceDelete();
            alert()->success('Xoá thành công');
            return redirect()->back();
        } catch (\Exception $e) {
            alert()->warning('Lỗi');
            return back();
        }
     }

    }


