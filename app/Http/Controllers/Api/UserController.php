<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    public function index()
    {
        // dd(123); 
        $user = User::all();
        return response()->json($user);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->address = $request->address;
        $user->password = bcrypt($request->password);
        // $user->phone = $request->phone;
        // $user->birthday = $request->birthday;
        // $user->gender = $request->gender;
        // $fieldName = 'image';
        // if ($request->hasFile($fieldName)) {
        //     $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
        //     $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
        //     $extenshion = $request->file($fieldName)->getClientOriginalExtension();
        //     $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
        //     $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
        //     $path = str_replace('public/', '', $path);
        //     $user->image = $path;
        // }
        $user->save();
        return response()->json([
            "success" => true,
            "message" => "Them thanh cong",
            "data"    => $user
        ],201);
    }
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->Delete();
        return response()->json([
            "success" => true,
            "message" => "Xoa thanh cong",
            "data"    => $user
        ],200);
    }

}