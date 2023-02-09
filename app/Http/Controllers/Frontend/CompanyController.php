<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){

        $companies = Company::all();
        return view('companies.index',compact('companies'));
    }

    public function show(Company $company){
        return view('companies.show', compact('company'));
    }
}
