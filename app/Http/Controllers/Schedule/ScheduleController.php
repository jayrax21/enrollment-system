<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;
class ScheduleController extends Controller
{
    public function addSchedule(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = request()->validate(
                [
                    'day_start' => 'required',
                    'day_end' => 'required',
                    'time_in' => 'required',
                    'time_out' => 'required'
                ],
                [
                    'day_start.required' => 'Enter Day In',
                    'day_end.required' => 'Enter Day Out',
                    'time_in.required' => 'Enter Time in',
                    'time_out.required' => 'Enter Time Out'
                ]
            );
            if(Schedule::create($data))
            {
                return redirect()->back()->with('succ','Schedule Added');
            }
            else
            {
                echo "error";
            }
        }
        $schedules = Schedule::all();
        return view('add-schedule')->with('schedules',$schedules);
    } 
    public function editSchedule(Request $request, $id)
    {
       $schedule = Schedule::find($id);
           $schedule->day_start = $request->day_start;
           $schedule->day_end = $request->day_end;
           $schedule->time_in = $request->time_in;
           $schedule->time_out = $request->time_out;
           $schedule->save();
           return redirect()->back()->with('edit', 'Updated successfully!');
    }
    public function deleteSchedule($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->back()->with('del','Deleted successfully!');
    }
}
