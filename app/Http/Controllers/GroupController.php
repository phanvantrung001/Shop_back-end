<?php

namespace App\Http\Controllers;
use App\Group;
use App\Role;
use App\User;
use App\Group_Role;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    function permission(String $id)
    {
        $roles = Role::orderBy('group_name')->get()->groupBy('group_name');
        return view('admin.group.permission',compact(['roles','id']));
    }
    function grantpermission(Request $request)
    {
        $group_id = $request->id;
        Group_Role::where('group_id',$group_id)->delete();
        $roles_id = $request->name;
        // dd($roles_id);
        foreach ($roles_id as $role_id) {
            $group_role = new Group_Role();
            $group_role->role_id = $role_id;
            $group_role->group_id = $group_id;
            $group_role->save();
        }
        alert()->success('Grant Permission Success');
        return redirect()->route('group.index');
    }
    // lay
    public function index()
    {
        // try {
            //code...
            $this->authorize('viewAny',Group::class);
            $groups = Group::with('user')->get();
            return view('admin.group.index',compact('groups'));
        // } catch (\Exception $e) {
        //     alert()->warning('Vui lòng thử lại');
        //     return back();
        // } 
    }

    /**
     * them mới
     */
    public function create()
    {
        try {
            $this->authorize('create',Group::class);
            return view('admin.group.create');
            //code...
        } catch (\Exception $e) {
            alert()->warning('Vui lòng thử lại');
            return back();
        } 
    }

    /**
     * xu ly them moi
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->save();
        alert()->success('Created Success');
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            //code...
            $group = Group::with('user')->findOrFail($id);
            // dd($group);
            $this->authorize('view',$group);
            return view('admin.group.show',compact('group'));
        } catch (\Exception $e) {
            alert()->warning('vui lòng thử lại');
            return back();
        } 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //code...
            $this->authorize('delete',Group::class);
            Group::destroy($id);
            alert()->success('Delete Success');
            return redirect()->route('group.index');
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
}

