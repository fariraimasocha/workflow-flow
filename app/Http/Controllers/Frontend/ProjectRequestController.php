<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectRequest;

class ProjectRequestController extends Controller
{
    // public function index(){

    //     $projectrequests = ProjectRequest::all();
    //     return view('projectrequests.index',compact('projectrequests'));
    // }
    public function create(Request $request)
    {
        $projectrequest = $request->session()->get('projectrequest');
        return view('projectrequests.create', compact('projectrequest'));
    }

    public function storecreate(Request $request)
    {
        $validated = $request->validate([

            'name' =>[ 'required'],
            'description' =>[ 'required' ],
            'timeframe' =>[ 'required' ],

        ]);

        if(empty($request->session()->get('projectrequest'))){
            $projectrequest =new ProjectRequest();
            $projectrequest->fill($validated);
            $projectrequest->save();
            $request->session()->pull('projectrequest' , $projectrequest);
        }else {
            $projectrequest =$request->session()->get('projectrequest' );
            $projectrequest->fill($validated);
            $request->session()->pull('projectrequest' , $projectrequest); 
        }

        return to_route('ThankYou');

    } 
}
