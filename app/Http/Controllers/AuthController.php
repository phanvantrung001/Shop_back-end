<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    function login(){
        return view('auth.login');    
    }
    function checkLogin(Request $request) {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where('email',$request->email)->first();
        // dd($user);
        if ($user && Hash::check($request->password, $user->password) && Auth::attempt($arr)) {
            $request->session()->put('login', true);
            alert()->success('Success Login');
            return redirect()->route('user.index');
        } else {
            $message = 'Đăng nhập không thành công, vui lòng thử lại ';
            return back()->with('login-fail', $message);
        }
    }
    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        $request->session()->flush();
        return redirect()->route('auth.login');
    }
    public function register()
    {
        return view('auth.login');
    }
    public function checkRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        $user->save();
        $message = "đăng ký thành công";
        $request->session()->flash('register-true',$message);
        return redirect()->route('auth.login');
    }
}