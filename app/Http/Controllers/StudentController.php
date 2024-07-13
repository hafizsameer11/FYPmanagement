<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user', 'supervisor', 'project')->get();
        return view('student.index', compact('students'));
    }
    public function create()
    {
        $supervisors = Supervisor::with('user')->get();
        $projects = Project::all();
        return view('student.create', compact('projects', 'supervisors'));
    }
    public function store(Request $request)
    {
        $email = $request->email;
        $password = Hash::make($request->password);
        $name = $request->name;
        $role = $request->role;
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->name = $name;
        $user->role = $role;
        $user->save();
        if ($user) {

            $student = new Student();
            $student->user_id = $user->id;
            $student->department = $request->department;
            $student->type = $request->type;
            $student->supervisor_id = $request->supervisor_id;
            $student->project_id = $request->project_id;
            $student->stid = $request->stid;

            $student->save();
            if ($student) {
                return redirect()->route('student.index')->with('success', 'Student Added Successfully');
            } else {
                return redirect()->route('student.index')->with('error', 'Student Not Added');
            }
        } else {
            return redirect()->route('student.index')->with('error', 'Student Not Added');
        }
    }
    public function edit($id)
    {
        $student = Student::find($id);
        $supervisors = Supervisor::with('user')->get();
        $projects = Project::all();
        return view('student.edit', compact('student', 'supervisors', 'projects'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->department = $request->department;
        $student->type = $request->type;
        $student->supervisor_id = $request->supervisor_id;
        $student->project_id = $request->project_id;
        $student->stid = $request->stid;

        $student->save();
        if ($student) {
            return redirect()->route('student.index')->with('success', 'Student Updated Successfully');
        } else {
            return redirect()->route('student.index')->with('error', 'Student Not Updated');
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('student.index')->with('success', 'Student Deleted Successfully');
        }
    }
    public function supervisorstudent()

    {
        $supervisor=Supervisor::where('user_id',Auth::user()->id)->first();
        $students = Student::where('supervisor_id', $supervisor->id)->with('user', 'project')->latest()->get();
        return view('student.supervisor', compact('students'));
    }
}
