<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Schedule;
use App\Room;
use App\Teacher;
use App\Subject;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials =
            [
                'username' => $request->username,
                'password' => $request->password,
            ];
            if(Auth::guard('admin')->attempt($credentials))
            {
                return redirect('admin/dashboard');
            }
            else
            {
                return redirect()->back()->with('flash','Invalid Username and Password Combination.');
            }
        }
        return view('admin-login');
    }
    public function dashboard()
    {

        $schedules = Schedule::all();
        $rooms = Room::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('admin-dashboard')->with('schedules',$schedules)
                                      ->with('rooms',$rooms)
                                      ->with('teachers',$teachers)
                                      ->with('subjects',$subjects);
    }
    public function addSubject()
    {
        
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('suc','You succesfully logged out.');
    }
}
