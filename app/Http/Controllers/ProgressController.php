<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function create(){
        // dd(Auth::user()->id);
        $student = Student::where('user_id', Auth::user()->id)->with('supervisor','project','user')->first();
        // dd($student);
        return view('progress.create',compact('student'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $studentid=Student::where('user_id',Auth::user()->id)->first();
        // Loop through each week's data
        foreach ($data['week_start_date'] as $index => $weekStartDate) {
            $progressReport = new Progress();
            $progressReport->student_id=$studentid->id;
            $progressReport->week_start_date = $weekStartDate;
            $progressReport->week_end_date = $data['week_end_date'][$index];
            $progressReport->description = $data['progress_description'][$index];
            $progressReport->research = $data['research_and_development'][$index];
            $progressReport->coding = $data['coding'][$index];
            $progressReport->documentation = $data['documentation'][$index];
            $progressReport->comments = $data['comments'];
            $progressReport->challenges = $data['challenges'];
            $progressReport->supervisorsignature = $data['supervisor_signature'];
            $progressReport->date = $data['date'];
            $progressReport->save();
        }

        return redirect()->back()->with('success', 'Progress Report Submitted Successfully');
    }
    public function show(Request $request){
        $students=Student::with('user')->get();
        $progress = Progress::where('student_id',$request->id)->with('student')->get();
        $st=Student::with('project','supervisor','user')->first();
        return view('progress.admin',compact('progress','students','st'));
    }
    public function showprog(){
        $students=Student::with('user')->get();
        return view('progress.admin',compact('students'));
    }
}
