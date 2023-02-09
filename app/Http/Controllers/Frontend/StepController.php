<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;

class StepController extends Controller
{
    public function index()
    {
        $steps = Step::all();

        return view('steps.index', compact('steps'));
    }
}
