<?php

namespace App\Http\Controllers\Admin;

use App\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = [
            'createUrl'=>'modules/create',
            'modalSize'=>'modal-lg',
            'title'=>'Create Module',
        ];

        $modules = Module::all();

        return view('admin.layouts.modules.index', compact('header', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.modules.create');
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

        $create = Module::create([
            'name' => $request->input('name'),
            'fa_icon' => $request->input('fa_icon'),
            'order_number' => $request->input('order_number'),
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
    public function edit(Module $module)
    {
        return view('admin.layouts.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $this->checkValidator($request);

        $module->name = $request->input('name');
        $module->fa_icon = $request->input('fa_icon');
        $module->order_number = $request->input('order_number');
        $module->status = $request->input('status')=='on' ? 1 : 0;

        $module->save();

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
        $delete = Module::find($id)->delete();
        if($delete){
            echo json_encode([
                'flag' => true,
                'message' => 'Module Deleted Successfully',
            ]);
        } else{
            echo json_encode([
                'message' => 'Error Found Here!',
            ]);
        }
        die();
    }
}
