<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use App\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = [
            'createUrl'=>'links/create',
            'modalSize'=>'modal-lg',
            'title'=>'Create Link',
        ];

        $links = Link::all();

        return view('admin.layouts.links.index', compact('header', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();

        return view('admin.layouts.links.create', compact('modules'));
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

        $create = Link::create([
            'name' => $request->input('name'),
            'module_id' => $request->input('module_id'),
            'order_number' => $request->input('order_number'),
            'status' => $request->input('status')=='on' ? 1 : 0,
        ]);

        return  redirect()->back();
    }

    private function checkValidator($request){
        return $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'module_id' => ['required'],
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
    public function edit(Link $link)
    {
        $modules = Module::all();
        return view('admin.layouts.links.edit', compact('modules', 'link'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Link::find($id)->delete();
        if($delete){
            echo json_encode([
                'flag' => true,
                'message' => 'Link Deleted Successfully',
            ]);
        } else{
            echo json_encode([
                'message' => 'Error Found Here!',
            ]);
        }
        die();
    }
}
