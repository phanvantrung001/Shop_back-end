<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){ 
        $users = User::get();
        return view('users.index',compact('users'));
    }
    public function create(){
        return view('users.create');
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
       $user->save();
       return redirect()->route('user.index');
    }
    public function edit(String $id){
        $user = User::find($id);
        return view('users.edit',compact(['user']));
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }

}


