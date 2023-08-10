<?php

namespace App\Http\Controllers;
use App\User;
use App\Group;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){ 
    try {
        $users = User::with('group')->get();
        $this->authorize('viewAny',User::class);
        $param = [
            'users' => $users,  
        ];
        return view('admin.users.index',$param);
    } catch (\Exception $e) {
        alert()->warning('Have problem! Please try again late');
        return back();
    }
    }
    public function create(){
        $groups = Group::get();
        $this->authorize('viewAny',User::class);
        return view('admin.users.create',compact('groups'));
    }
    public function store(Request $request){
        $validated = $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12'
            ],
            [
                'name.required' => 'khong duoc de trong',
                'email.email' =>'email khong dung dinh dang ',
                'email.required' =>'email khong duoc de trong ',
                'email.unique:users'=>'email da ton tai',
                'password.min:8' => 'mat khau toi thieu 8 ki tu',
                'password.max:15' => 'mat khau toi da 8 ki tu',
            ]
        );
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->group_id = $request->group_id;
       $user->save();
       alert()->success('Thành Công');
       return redirect()->route('user.index');
    }
    public function edit(String $id){
        $this->authorize('viewAny',User::class);

        $user = User::find($id);
        return view('admin.users.edit',compact(['user']));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user.index');
    }
    
    public function destroy($id){
        $this->authorize('viewAny',User::class);

        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }

}


