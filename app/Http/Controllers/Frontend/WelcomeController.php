<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class WelcomeController extends Controller
{
    public function index(Request $request)
    {

        $query = $request->query('search', '');

        $projects = Project::search($query)->get();


        $completedCount = Project::where('status', 'completed')->count();
        $rejectedCount = Project::where('status', 'rejected')->count();
        $pendingCount = Project::where('status', 'pending')->count();

        $total = $pendingCount + $rejectedCount + $completedCount;

       
        return view('welcome', compact('projects', 'completedCount','rejectedCount','pendingCount'));
    }

    public function ThankYou()
    {
        return view('ThankYou');
    }
}
