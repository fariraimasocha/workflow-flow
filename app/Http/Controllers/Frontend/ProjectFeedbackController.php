<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProjectFeedback;
use Illuminate\Http\Request;

class ProjectFeedbackController extends Controller
{
    public function index()
    {
        $projectfeedbacks = ProjectFeedback::all();
        return view('projectfeedbacks.index',compact('projectfeedbacks'));
    }


}
