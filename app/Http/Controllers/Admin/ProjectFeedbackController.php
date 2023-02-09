<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectFeedback;
use App\Http\Requests\ProjectFeedbackStoreRequest;

class ProjectFeedbackController extends Controller

{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       

        $projectfeedbacks = ProjectFeedback::all();
        return view('admin.projectfeedbacks.index',compact('projectfeedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projectfeedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProjectFeedbackStoreRequest $request)
    {
        ProjectFeedback::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'timeframe'=>$request->timeframe,
            'cost'=>$request->cost,

        ]);

        return to_route('admin.projectfeedbacks.index')->with('success', 'Feedback created successfully');
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
    public function edit(ProjectFeedback $projectfeedback)
    {
        return view('admin.projectfeedbacks.edit',compact('projectfeedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectFeedback $projectfeedback)
    {
        $request->validate([

            'name'=>'required',
            'description'=>'required',
            'timeframe'=>'required',
            'cost'=>'required',
        ]);

        $projectfeedback->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'timeframe'=>$request->timeframe,
            'cost'=>$request->cost,
            
        ]);
        return to_route('admin.projectfeedbacks.index')->with('success', 'Feedback updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFeedback $projectfeedback)
    {
        $projectfeedback->delete();

        return to_route('admin.projectfeedbacks.index')->with('danger', 'Company deleted successfully');
    }
  
}
