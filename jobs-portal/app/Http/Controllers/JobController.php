<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\JobPosition;
use App\Models\Applicant;
use App\Models\File;


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
        $file = File::create($request->all());

    
        if($request->hasFile('files'))
        {
    
             $files = $request->file('files');

            foreach ($files as $i => $file) {

                // $v = $request->validate([
                // 'files.*' => 'mimes:doc,docx,pdf,jpg,jpeg|max:5240'
                // ]);

                // $file = $v['files'];

                $fileNum = $i + 1; 
                $origName = $file->getClientOriginalName();
                $origExtension = $file->getClientOriginalExtension();
                $fileName = 'ID-' . $applicant->id.'-file-'.$fileNum.'-'.$origName;


                $file->move(public_path('files'), $fileName);


                $applicant_id = DB::table('applicants')->max('id');
                $file = new File;
                $file->applicant_id = $applicant_id;
                $file->name = $fileName;
                $file->save();
            }
        }


        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:1',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'why_you' => 'required',
            'location' => 'required',
            [
                'files.*.mime' => 'mimes:doc,docx,pdf,jpg,jpeg',
                'files.*.size' => 'max:5240',
                'files' => 'max: 5',
            ],
        ]);


        if ($validator->fails()) {
        return redirect(url()->previous() .'#form')
            ->withErrors($validator)
            ->withInput();
        }

        session()->flash('successful_application', 'Thank you for your application, we will contact you soon');

        return view('success');
    }
}
