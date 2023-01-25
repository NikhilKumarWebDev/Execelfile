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

   public function update(Request $request){
      $firstname=$request->get('firstname');
      $lastname= $request->get('lastname');
      $jobtittle=$request->get('jobtitle');
      $email= $request->get('email');
      $birthdate=$request->get('birthdate');
      $phone = $request->get('phone');
      $domain = $request->get('domain');
      $comments = $request->get('comments');

      $students=Student::find($email);
      $students->Student = $firstname;
      $students->Student = $lastname;
      $jobtittle->Student = $jobtittle;
      $email->Student = $email;
      $birthdate->Student = $birthdate;
      $domain->Student = $domain;
      $comments->Student = $comments;
      $students->save();
      return redirect('welcome');
   }

   

}
