<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::where('supervisor_id',Auth::user()->id)->get();
        return view('meeting.index', compact('meetings'));
    }

    public function create()
    {
        $students = Student::all();
        return view('meeting.create', compact('students'));
    }

    public function store(Request $request)
    {
        $meeting = new Meeting();
        $meeting->title = $request->title;
        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->student_id = $request->student_id;
        $meeting->supervisor_id = $request->supervisor_id; 
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
        $student = Student::all();
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
            $meeting->supervisor_id = $request->supervisor_id;
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
}
