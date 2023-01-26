<?php

namespace App\Http\Controllers;


use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;



class StudentController extends Controller
{
   public function index(){
      $students = Student::all(); 
      return view('welcome',compact('students'));
   }

   public function import(Request $request){
     
    Excel::import(new StudentsImport,$request->file('student_file'));
     $data=[
      'email'=>'toshakparmar2000@gmail.com'
     ];
    Mail::send('email',$data,function($message){
      $message->to('toshakparmar2000@gmail.com')->subject("Importing the excel and sending the email ");
      $message->attach('C:\xampp\htdocs\Excelfile\public\contacts (3).xlsx');
      

    });
    return back();

   }

}
