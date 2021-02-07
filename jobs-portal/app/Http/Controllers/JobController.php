<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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

        $applicant = Applicant::create($request->all());

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:1',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            ['files.*' => 'mimes:doc,docx,pdf|max:5000'],
            ['files.*.mimes' => 'Only jpeg,png and bmp images are allowed'],
        ]);


        if($request->hasFile('files'))
        {
            $files = $request->file('files');

            foreach ($files as $i => $file) {
            $fileNum = $i + 1; 
            $origName = $file->getClientOriginalName();
            $origExtension = $file->getClientOriginalExtension();
            $fileName = 'ID-' . $applicant->id.'-file-'.$fileNum.'-'.$origName;
            $file->move(public_path('files'), $fileName);
        }
        }

        if ($validator->fails()) {
        return redirect(url()->previous() .'#form')
            ->withErrors($validator)
            ->withInput();
        }

        session()->flash('successful_application', 'Thank you for your application, we will contact you soon');

        return view('success');
    }
}
