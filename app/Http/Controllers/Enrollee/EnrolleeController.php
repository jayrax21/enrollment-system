<?php

namespace App\Http\Controllers\Enrollee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\Enrollee;
class EnrolleeController extends Controller
{
    public function dashboard()
    {
        $subjects = Subject::all();
        return view('student-dashboard')->with('subjects',$subjects);
    }
    public function loadSubject(Request $id)
    {
       $subject = Subject::find($id)->first();
       return $subject;
    }
    public function addEnrolle(Request $request)
    {
       $data = 
       [
            "student_id" => $request->student_id,
            "subject_id" => implode(",",$request->subject_id),
       ];
       if(Enrollee::create($data))
       {
            return redirect()->back()->with('succ','Your enrollment request has been pending.');
       }    
       else{
           echo "error";
       }
    }
}
