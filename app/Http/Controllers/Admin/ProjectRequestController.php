<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectRequest;
use App\Http\Requests\ProjectRequestStoreRequest;
use Illuminate\Support\Facades\Storage;

class ProjectRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectrequests = ProjectRequest::all();
        return view('admin.projectrequests.index',compact('projectrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projectrequests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProjectRequestStoreRequest $request)
    {
        ProjectRequest::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'timeframe'=>$request->timeframe,

        ]);

        return to_route('admin.projectrequests.index')->with('success', 'Request created successfully');
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
    public function edit(ProjectRequest $projectrequest)
    {
        return view('admin.projectrequests.edit',compact('projectrequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectRequest $projectrequest)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'timeframe'=>'required',
            

        ]);

        $projectrequest->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'timeframe'=>$request->timeframe,
            
        ]);
        return to_route('admin.projectrequests.index')->with('success', 'Request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectRequest $projectrequest)
    {
        $projectrequest->delete();

        return to_route('admin.projectrequests.index')->with('danger', 'Request deleted successfully');
    }
}
