<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index()
    {
        $supervisorid=Supervisor::where('user_id',Auth::user()->id)->pluck('id');
        $meetings = Meeting::where('supervisor_id',$supervisorid)->get();
        $students = Student::with('user')->get();
        return view('meeting.index', compact('meetings','students'));
    }

    public function create()
    {
        $students = Student::with('user')->get();
        return view('meeting.index', compact('students'));
    }

    public function store(Request $request)
    {
        $supervisor=Supervisor::where('user_id',Auth::user()->id)->first();

        $meeting = new Meeting();
        $meeting->title = $request->title;
        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->student_id = $request->student_id;
        $meeting->supervisor_id = $supervisor->id;
        $meeting->save();

        if ($meeting) {
            return redirect()->route('meeting.index')->with('success', 'Meeting Added Successfully');
        } else {
            return redirect()->route('meeting.index')->with('error', 'Meeting Not Added');
        }
    }

    public function edit($id)
    {
        $meeting = Meeting::find($id);
        $student = Student::with('user')->get();
        return response()->json(['meeting' => $meeting, 'student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $meeting = Meeting::find($id);
        if ($meeting) {
            $meeting->title = $request->title;
            $meeting->date = $request->date;
            $meeting->time = $request->time;
            $meeting->student_id = $request->student_id;
            $meeting->save();
            return redirect()->route('meeting.index')->with('success', 'Meeting Updated Successfully');
        } else {
            return redirect()->route('meeting.index')->with('error', 'Meeting Not Updated');
        }
    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);
        if ($meeting) {
            $meeting->delete();
            return redirect()->route('meeting.index')->with('success', 'Meeting Deleted Successfully');
        } else {
            return redirect()->route('meeting.index')->with('error', 'Meeting Not Found');
        }
    }

    //student showing
    public function studentmeetings(){
        $studentid=Student::where('user_id',Auth::user()->id)->first();
        $studentid=$studentid->id;
        $meetings=Meeting::where('student_id',$studentid)->with('student','supervisor')->latest()->get();
        return view('meeting.student',compact('meetings'));
    }
}
