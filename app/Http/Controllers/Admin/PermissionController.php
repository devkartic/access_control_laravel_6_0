<?php

namespace App\Http\Controllers\Admin;

use App\Module;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.layouts.permissions.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id = $request->input('role_id');
        $modules = Module::all();
        return view('admin.layouts.permissions.show', compact('modules', 'role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role_id = $request->input('role_id');
        $link_id = $request->input('link_id');
        $permission_type = $request->input('permission_type');
        $hasPermission = $request->input('hasPermission');

        $permission = Permission::all()->where('role_id', '=', $role_id)->where('link_id', '=', $link_id)->first();
        if($permission){
            $permission->$permission_type = $hasPermission;
            $permission->save();
        } else{
            Permission::create([
                'role_id' => $role_id,
                'link_id' => $link_id,
                $permission_type => $hasPermission
            ]);
        }

    }
}
