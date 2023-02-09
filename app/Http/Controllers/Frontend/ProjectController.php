<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    public function show(Project $project){
        return view('projects.show', compact('project'));
    }

    public function create(Request $request)
    {
        $project = $request->session()->get('project');
        return view('projects.create', compact('project'));
    }

    public function storecreate(Request $request)
    {
        $validated = $request->validate([

            'name' =>[ 'required'],
            'description' =>[ 'required' ],
            'company' =>[ 'required' ],
            'status' =>[ 'required'],

        ]);

        if(empty($request->session()->get('project'))){
            $project =new Project();
            $project->fill($validated);
            $project->save();
            $request->session()->pull('project' , $project);
        }else {
            $project =$request->session()->get('project' );
            $project->fill($validated);
            $request->session()->pull('project' , $project); 
        }

        return to_route('ThankYou');

    } 


}
