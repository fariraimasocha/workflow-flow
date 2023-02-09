<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Step;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Support\Facades\Auth;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {

        $request->merge(['company' =>
        Auth::user()->name 
    ]);
        Project::create([

            'name' => $request->name,
            'description'=>$request->description,
            'bill'=>$request->bill,
            'company' => auth()->user()->name,
           

            

        ]);
        return to_route('admin.steps.create')->with('success','project created successfully now create steps');

      
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
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'bill' =>'required',
            'company' =>'required',
            'status' =>'required',
           
            

        ]);

        $project->update([

            'name'=>$request->name,
            'description'=>$request->description,
            'bill'=>$request->bill,
            'company'=>$request->company,
            'status'=>$request->status,
            
            
            
        ]);
        return to_route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->steps()->detach();
        $project->delete();
        return to_route('admin.projects.index')->with('danger', 'Project deleted successfully');
    
    }
}
