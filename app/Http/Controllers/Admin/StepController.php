<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Project;
use App\Http\Requests\StepStoreRequest;
use Illuminate\Support\Facades\Storage;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps = step::all();
        return view('admin.steps.index',compact('steps'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('admin.steps.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepStoreRequest $request)
    {
        $step = Step::create([
            'name'=>$request->name,
            'handler' => $request->handler,
            
        ]);

        if($request->has('projects')){
            $step->projects()->attach($request->projects);
        }

        return to_route('admin.steps.index')->with('success', 'Step created successfully');
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
    public function edit(Step $step)
    {
        $projects = Project::all();
        return view('admin.steps.edit',compact('step','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Step $step)
    {
        $request->validate([
            'name'=>'required',
            'handler'=>'required',
            'status' =>'required',
        ]);

        $step->update([
            'name'=>$request->name,
            'handler' => $request->handler,
            'status'=>$request->status,
          
            
            
        ]);
        return to_route('admin.steps.index')->with('success', 'Step updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        $step->projects()->detach();
        $step->delete();
        return to_route('admin.steps.index')->with('danger', 'Step deleted successfully');
    }
}
