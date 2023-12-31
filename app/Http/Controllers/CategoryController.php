<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Http\Requests\StoreCategoryRequest;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {  
        $this->authorize('viewAny',Category::class);
        $categories = Category::paginate(4);
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $this->authorize('create',Category::class);
        return view('admin.categories.create');
    }
    public function store(StoreCategoryRequest $request)
    {
     
        $category = new Category();
        $category->name = $request->name;
        $category->mota = $request->mota;

        $category->save();
        alert()->success('Thêm thành công');

        return redirect()->route('category.index');
    }
    public function edit(String $id)
    {
        $category = Category::find($id);
        $this->authorize('update',$category);
        return view('admin.categories.edit', compact(['category']));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->mota = $request->moata;

        $category->save();
        alert()->success('Cập nhật thành công');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $this->authorize('delete',$category);
            $category->delete();
            alert()->success('delete success');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
    function trash()
    {
        try {
            $this->authorize('viewTrash',Category::class);
            $softs = Category::onlyTrashed()->get();
            return view('admin.categories.trash', compact('softs'));
        } catch (\Exception $e) {
            alert()->warning('Không có quyền');
            return back();
        }
    }
    function restore(String $id)
    {
        try {
            $softs = Category::withTrashed()->find($id);
            $this->authorize('restore',$softs);
            $softs->restore();
            alert()->success('Khôi Phục thành công');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            alert()->warning('Lỗi');
            return redirect()->route('category.index');
        }
    }
    function deleteforever(String $id)
    {
        try {
            
            $softs = Category::withTrashed()->find($id);
            $this->authorize('forceDelete',$softs);
            $softs->forceDelete();
            alert()->success('Xoá thành công');
            return redirect()->back();
        } catch (\Exception $e) {
            alert()->warning('Lỗi');
            return back();
        }
    }
}
