<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;
use App\Enrollee;
use App\Student;
use App\Decline;
use Auth;
class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher')->with('teachers',$teachers);
    }
    public function addTeacher(Request $request)
    {
        $data = request()->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'contact' => 'required'
            ],
            [
                'fname.required' => 'First Name is required.',
                'lname.required' => 'Last Name is required',
                'contact.required'  => 'Contact is required'
            ]
        );
        Teacher::create($data);
        return redirect()->back()->with('succ','Teacher added successfully.');
    }
    public function editTeacher(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->fname = $request->fname;
        $teacher->lname = $request->lname;
        $teacher->contact = $request->contact;
        $teacher->save();
        return redirect()->back()->with('succ','Updated successfully.');
    }
    public function delTeacher($id)
    {
      
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->back()->with('del','Deleted successfully.');
    }
    public function enrolleeReq($id)
    {
        $enrollees = Enrollee::where('student_id',$id)->first();
        $student  = Student::where('id',$enrollees->student_id)->first();
        
        return view('admin-enrollee-list')->with('enrollees',$enrollees)
                                          ->with('student',$student)
                                          ->with('subject',$enrollees->subject_id);
    }
    public function declineReq(Request $request){
        if($request->isMethod('post'))
        {
            $data=[
                'enroll_id' => $request->enroll_id,
                'remarks' => $request->remarks
            ];
            Decline::create( $data);
            Auth::guard('admin')->user()->unreadNotifications->markasRead();
            return redirect('admin/pending')->with('suc','Request declined successfully.');
        }
        $declines = Decline::all();
        return view('decline')->with('declines',$declines);
    }

}
