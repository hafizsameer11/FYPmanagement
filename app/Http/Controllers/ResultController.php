<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use LDAP\Result;

class ResultController extends Controller
{
    //
    public function index(){
        $students=Student::all();
        if(Auth::user()->role=='student'){
            $student=Student::where('user_id',Auth::user()->id)->first();
            $results=Result::with('student')->where('student_id',$student->id)->latest()->get();
        }else{

            $results=Result::with('student')->latest()->get();
        }
        return view('result.index',compact('results','students'));
    }
    public function create(){
        $students=Student::all();
        return view('result.create',compact('students'));

    }
    public function store(Request $request)
    {
        // dd($request);
        $result = new Result();
        $result->class = $request->class;
        $result->student_id = $request->student_id;
        $result->cgpa = $request->cgpa;
        $result->grade = $request->grade;
        $result->obtain_marks = $request->obtain_marks;
        $result->total_marks = $request->total_marks;
        $result->status = 'pending';
        $result->save();
        if($result){
            return redirect()->route('result.index')->with('success','Result Added Successfully');
        }else{
            return redirect()->route('result.index')->with('error','Something went wrong');
        }
    }
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'class' => 'required|string',
        'student_id' => 'required|integer|exists:students,id',
        'cgpa' => 'required|numeric',
        'grade' => 'required|string',
        'obtain_marks' => 'required|numeric',
        'total_marks' => 'required|numeric',
    ]);

    // Retrieve the existing result by ID
    $result = Result::findOrFail($id);

    // Update the result with the new data
    $result->class = $request->class;
    $result->student_id = $request->student_id;
    $result->cgpa = $request->cgpa;
    $result->grade = $request->grade;
    $result->obtain_marks = $request->obtain_marks;
    $result->total_marks = $request->total_marks;
    $result->status = 'pending'; // Keep the status as 'pending' or update as needed

    // Save the changes to the database
    $result->save();

    // Redirect with a success or error message
    if ($result) {
        return redirect()->route('result.index')->with('success', 'Result updated successfully.');
    } else {
        return redirect()->route('result.index')->with('error', 'Something went wrong.');
    }
}

    public function edit($id){
        $record=Result::find($id);
        $students=Student::all();
        return view('result.create',compact('record','students'));
    }
    public function publish($id){
        $record=Result::find($id);
        $record->status='published';
        $record->save();
        if($record){

            return redirect()->route('result.index')->with('success','Result Published Successfully');
        }else{
            return redirect()->route('result.index')->with('error','Something went wrong');
        }

    }
    public function destroy($id){
        $record=Result::find($id);
        $record->delete();
        if($record){
            return redirect()->route('result.index')->with('success','Result Deleted Successfully');
            }else{
                return redirect()->route('result.index')->with('error','Something went wrong');
                }

    }


}
