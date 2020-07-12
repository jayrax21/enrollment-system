<?php

namespace App\Http\Controllers\Confirm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Confirm;
use App\Notifications\ConfirmEnroll;
use App\Admin;
use App\Enrollee;
use App\Student;
use Auth;
class ConfirmController extends Controller
{
    public function confirm(Request $request)
    {   
        $data = ['enroll_id' => $request->enroll_id];
        $enroll = Enrollee::where('id',$request->enroll_id)->first();
        $student = Student::where('id',$enroll->student_id)->first();
        $student->notify(new ConfirmEnroll($student));
        Confirm::create($data);
        Auth::guard('admin')->user()->unreadNotifications->markAsRead();
        return redirect('admin/pending')->with('flash','Enrollee has been confirmed');
    }
    public function decline(Request $request)
    {
        
    }
}
