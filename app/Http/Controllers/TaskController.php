<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Supervisor;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('student', 'supervisor')->get();
        $students = Student::with('user')->get();
        return view('task.index', compact('tasks', 'students'));
    }

    public function create()
    {
        $students = Student::all();
        $supervisors = Supervisor::all();
        return view('task.create', compact('students', 'supervisors'));
    }
    public function updatestatus($id, $status)
    {

        $task = Task::find($id);
        $task->status = $status;
        $task->save();
        return redirect()->back();
    }
    public function store(Request $request)
    {

        $supervisor = Supervisor::where('user_id', Auth::user()->id)->first();

        $task = new Task();
        $task->name = $request->name;
        $task->type = $request->type;
        $task->description = $request->description;
        $task->status = "Pending";
        $task->start_dtae = $request->start_date;
        $task->end_date = $request->end_date;
        $task->student_id = $request->student_id;
        $task->supervisor_id = $supervisor->id;
        $task->save();

        if ($task) {
            return redirect()->route('task.index')->with('success', 'Task Added Successfully');
        } else {
            return redirect()->route('task.index')->with('error', 'Task Not Added');
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $students = Student::all();
        $supervisors = Supervisor::all();
        return view('task.edit', compact('task', 'students', 'supervisors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'student_id' => 'required|exists:students,id',
            'supervisor_id' => 'required|exists:supervisors,id',
        ]);

        $task = Task::find($id);
        $task->name = $request->name;
        $task->type = $request->type;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->student_id = $request->student_id;
        $task->supervisor_id = $request->supervisor_id;
        $task->save();

        if ($task) {
            return redirect()->route('task.index')->with('success', 'Task Updated Successfully');
        } else {
            return redirect()->route('task.index')->with('error', 'Task Not Updated');
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect()->route('task.index')->with('success', 'Task Deleted Successfully');
        } else {
            return redirect()->route('task.index')->with('error', 'Task Not Found');
        }
    }
    public function studentdetails($id)
    {
        // if($id){
        //     return response()->json($id);
        // }
        $student = Student::with('user', 'project')->where('id', $id)->first();
        return response()->json(['student' => $student]);
    }
}
