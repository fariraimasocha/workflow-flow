<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }
}
