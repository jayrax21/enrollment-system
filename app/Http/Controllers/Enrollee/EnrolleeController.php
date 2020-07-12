<?php

namespace App\Http\Controllers\Enrollee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\Enrollee;
use App\Notifications\EnrolleeRequest;
use App\Admin;
use Auth;
use App\Confirm;
use App\Student;
use DB; 
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
            $admin = Admin::all();
            $admin->each->notify(new EnrolleeRequest(Auth::guard('student')->user(),Enrollee::find($request->student_id)));
            return redirect()->back()->with('succ','Your enrollment request has been pending.');

       }    
       else{
           echo "error";
       }
    }
    public function enrollelist(){
        $confirms = Confirm::all();
        return view('enroll-list')->with('confirms',$confirms);
    }
    public function pending(Request $request)
    {
        $enrolls = DB::table('enrollees')
                        ->whereNotIn('id',function($query){
                            $query->select('enroll_id')->from('confirms');
                        })
                        ->whereNotin('id',function($query1){
                            $query1->select('enroll_id')->from('declines');
                        })->get();
        return view('pending-enrollees')->with('enrolls',$enrolls);
    }
    public function assesment($id){
        if(isset($id)){
            $enroll = Enrollee::where('student_id',$id)->first();
            if(isset($enroll)){
                $subjects = array();
                $subject_id = explode(",",$enroll->subject_id);
                Auth::guard('student')->user()->unreadNotifications->markasRead();
                foreach($subject_id as $subject_id){
                    $subject = Subject::where('id',$subject_id)->first();
                    array_push($subjects,$subject);
                }
                return view('student-assesment')->with('subjects',$subjects);
            }
            else{
                return view('no-student-assesment');
            }
        }
        else{
            return view('student-assesment');
        }
    }
}
