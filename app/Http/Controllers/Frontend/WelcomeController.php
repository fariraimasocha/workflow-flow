<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class WelcomeController extends Controller
{
    public function index(Request $request){

        
        $request->validate([
            'search' => 'nullable|string|max:50'
       ]);
         Project::where('name', '%'.$request->input('search').'%')->get();  


        $projects = Project::when($request->filled('search'), fn($query) 
        => $query->where('name', '%'.$request->input('search').'%'))->get();


        $completedCount = Project::where('status', 'completed')->count();
        $rejectedCount = Project::where('status', 'rejected')->count();
        $pendingCount = Project::where('status', 'pending')->count();

        $total = $pendingCount + $rejectedCount + $completedCount;

       
        return view('welcome', compact('projects', 'completedCount','rejectedCount','pendingCount'));
    }

    public function ThankYou(){
        return view('ThankYou');
    }
}
