<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
class SubjectController extends Controller
{
    public function addSubject(Request $request)
    {   

        $validate =  Subject::where('schedule_id',$request->schedule_id)
                             ->where('room_id',$request->room_id)
                             ->count();
        if($validate >= 1 )
        {
           return redirect()->back()->with('fail','Room and Schedule are already occupied');
        }
        else
        {
            $data = request()->validate(
                [
                    'subject_name' => 'required',
                    'subject_code' => 'required',
                    'description' => 'required',
                    'schedule_id' => 'required',
                    'room_id' => 'required',
                    'teacher_id' => 'required',
                ],
                [
                    'subject_name.required' => 'Enter Subject Name.',
                    'subject_code.required' => 'Enter Subject Code.',
                    'description.required' => 'Enter Subject Description.',
                    'schedule_id.required' => 'No entered Schedule.',
                    'room_id.required' => 'No entered Room.',
                    'teacher_id' => 'No entered Teacher.'
                ]
            );
            Subject::create($data);
            return redirect()->back()->with('succ','Subject successfully added');
        }
    }
    public function editSubject(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->description = $request->description;
        $subject->schedule_id = $request->schedule_id;
        $subject->room_id = $request->room_id;
        $subject->teacher_id = $request->teacher_id;
            $subject->save();
       return redirect()->back()->with('succ','Updated successfully!');
    }
    public function delSubject($id)
    {
         $subject = Subject::find($id);
         $subject->delete();
         return redirect()->back()->with('fail','Deleted successfully!');
    }
}
