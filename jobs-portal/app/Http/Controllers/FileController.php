<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\JobPosition;
use App\Models\Applicant;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

// class FileController extends Controller
// {
//     public function destroy() {

//         // $input = Input::all();

//         $input = Input::hasFile('files');


//         //   if($request->hasFile('files'))
//         // {
//         //     $files = $request->file('files');
//         //     $files->delete();  
//         // }

//         dd($input);
        
//         $input->delete();
        

//         // $file_path = public_path('files').$request->Files; 

//         // if (file_exists($file_path)) {
//         //     @unlink($file_path);
//         // }
//         // return view('detail').'#form';
//         // return redirect(url()->previous().'#form')->withInput();
//         // return back()->withInput();
//         // return Redirect::to('form')->withInput();
//         return Redirect::back()->withInput(Input::all());
//     }   
// }
