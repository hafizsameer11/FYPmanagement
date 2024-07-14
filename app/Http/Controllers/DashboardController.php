<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Notice;
use App\Models\Progress;
use App\Models\Project;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //


    public function index(){
        if(Auth::user()->role=='student'){
            $student=Student::where('user_id',Auth::user()->id)->first();
            $studdent_id=$student->id;
            $progress = Progress::where('student_id',$studdent_id)->with('student')->get();
            $meetings=Meeting::where('student_id',$studdent_id)->with('student','supervisor')->latest()->get();
            $tasks=Task::where('student_id',$student->id)->with('student','supervisor')->latest()->get();
            $notices=Notice::where('type','student')->latest()->get();
            return view('dashboard.student',compact('progress','meetings','tasks','notices'));
        }else if(Auth::user()->role=='supervisor'){

            return view('dashboard.supervisor');
        }

        else{
            $totalStudents = Student::count();
            $supervisors=Supervisor::count();
            $project=Project::count();
            $students = Student::with('user', 'supervisor', 'project')->get();
            return view('dashboard.index',compact('students','totalStudents','supervisors','project'));
        }
    }
}
