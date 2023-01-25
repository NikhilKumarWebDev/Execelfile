<?php

namespace App\Http\Controllers;


use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use mysqli;


class StudentController extends Controller
{
   public function index(){
      $students = Student::all(); 
      return view('welcome',compact('students'));
   }

   public function import(Request $request){
     
    Excel::import(new StudentsImport,$request->file('student_file'));
    return back();

   }

}
