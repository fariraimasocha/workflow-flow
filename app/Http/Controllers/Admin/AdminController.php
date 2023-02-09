<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class AdminController extends Controller
{
 

    public function index(){


        $projects = Project::all();
        $completedCount = Project::where('status', 'completed')->count();
        $rejectedCount = Project::where('status', 'rejected')->count();
        $pendingCount = Project::where('status', 'pending')->count();
        

        $totalCount = $pendingCount + $rejectedCount + $completedCount;

       
        return view('admin.index', compact('projects', 'completedCount','rejectedCount','pendingCount','totalCount'));
    }

    public function ThankYou(){
        return view('ThankYou');
    }
}
