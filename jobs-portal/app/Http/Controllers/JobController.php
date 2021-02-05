<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\JobPosition;
use App\Models\Applicant;

class JobController extends Controller
{
    public function index() 
    {
        $jobs = JobPosition::get();
        return view('jobs', compact('jobs'));
    }

    public function show($id)
    {
        $job = JobPosition::findOrFail($id);
        return view('details', compact('job'));
    }

    public function store(Request $request)
    {
        // $applicant = new Applicant;

        // $job_id = $request->input('job_position_id');

        // $applicant->job_position_id = $request->input('job_position_id');
        // $applicant->first_name = $request->input('first_name');
        // $applicant->last_name = $request->input('last_name');
        // $applicant->email = $request->input('email');
        // $applicant->phone = $request->input('phone');
        // $applicant->linkedin = $request->input('linkedin');
        // $applicant->why_you = $request->input('why_you');
        // $applicant->location = $request->input('location');
        // $applicant->save();

        // $this->validate($request, [
        //     'first_name' => 'required|string|min:10|max:100'
        // ]);

        $applicant = Applicant::create($request->all());

        session()->flash('successful_application', 'Thank you for your application, we will contact you soon');
        return view('success');
    }
}
