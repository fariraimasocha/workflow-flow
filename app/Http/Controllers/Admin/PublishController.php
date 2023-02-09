<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publish;
use App\Http\Requests\PublishStoreRequest;


class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishes = publish::all();
        return view('admin.publishes.index',compact('publishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishes = publish::all();
        return view('admin.publishes.create',compact('publishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublishStoreRequest $request)
    {
        $publish = Publish::create([
            'link'=>$request->link,
            'project'=>$request->project,  
        ]);

       
        return to_route('admin.publishes.index')->with('success', 'Publish created successfully');
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
    public function edit(Publish $publish)
    {
       
        return view('admin.publishes.edit',compact('publish'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publish $publish)
    {
        $request->validate([
            'link'=>'required',
            'project'=>'required',
        ]);

        $publish->update([
            'link'=>$request->link,
            'project'=>$request->project,
        ]);

        return to_route('admin.publishes.index')->with('success', 'Publish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publish $publish)
    {
        $publish->delete();
        return to_route('admin.publishes.index')->with('danger', 'Publish deleted successfully');
    }
}
