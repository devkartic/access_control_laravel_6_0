<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = [
            'createUrl'=>'roles/create',
            'modalSize'=>'modal-md',
            'title'=>'Create Role',
        ];

        $roles = Role::all();

        return view('admin.layouts.roles.index', compact('header', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkValidator($request);

        $create = Role::create([
            'name' => $request->input('name'),
            'status' => $request->input('status')=='on' ? 1 : 0,
        ]);

        return  redirect()->back();
    }

    private function checkValidator($request){
        return $request->validate([
            'name' => ['required', 'string', 'max:20'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.layouts.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->checkValidator($request);

        $role->name = $request->input('name');
        $role->status = $request->input('status')=='on' ? 1 : 0;

        $role->save();

        return  redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Role::find($id)->delete();
        if($delete){
            echo json_encode([
                'flag' => true,
                'message' => 'Role Deleted Successfully',
            ]);
        } else{
            echo json_encode([
                'message' => 'Error Found Here!',
            ]);
        }
        die();
    }
}
