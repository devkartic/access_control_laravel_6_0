<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = [
            'createUrl'=>'users/create',
            'modalSize'=>'modal-lg',
            'title'=>'Create User',
        ];

        $users = User::all();

        return view('admin.layouts.users.index', compact('header', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.layouts.users.create', compact('roles'));
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

        $create = User::create([
            'user_name' => $request->input('user_name'),
            'role_id' => $request->input('role_id'),
            'email' => $request->input('email'),
            'status' => $this->checkStatus($request->input('status')),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back();
    }

    private function checkValidator($request){
        return $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.layouts.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        dd($request);
        $this->checkValidator($request);
        $user->name = $request->input('user_name');
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->status = $this->checkStatus($request->input('status'));
        $password = $request->input('password');
        if(!empty($password)) $user->password = Hash::make($password);
        $user->save();
        return redirect()->back();
    }

    public function activityHandler(Request $request){
        $user_id = $request->input('user_id');
        $status = $request->input('status');
        if($status==0) $status=1; else $status = 0;
        $user = User::find($user_id);
        $user->status = $status;
        $user->save();
        echo $status;
        die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();
        if($delete){
            echo json_encode([
                'flag' => true,
                'message' => 'User Deleted Successfully',
            ]);
        } else{
            echo json_encode([
                'message' => 'Error Found Here!',
            ]);
        }
        die();
    }
}
