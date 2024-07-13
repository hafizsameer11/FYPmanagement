<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }
    public function create()
    {
        return view('project.index');
    }
    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->pnumber = $request->pnumber;
        $project->status = $request->status;
        $project->year = $request->year;
        $project->save();
        if ($project) {
            return redirect()->route('project.index')->with('success', 'Student Added Successfully');
        }
    }
    public function edit($id)
    {
        $project = Project::find($id);
        if ($project) {
            return response()->json('project', $project);
        }
    }
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        $project->name = $request->name;
        $project->pnumber = $request->pnumber;
        $project->status = $request->status;
        $project->year = $request->year;
        $project->save();


        if ($project) {
            return redirect()->route('project.index')->with('success', 'Project Updated Successfully');
        } else {
            return redirect()->route('project.index')->with('error', 'Project Not Updated');
        }
    }

    public function destroy($id)
    {
        $student = Project::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('project.index')->with('success', 'Student Deleted Successfully');
        }
    }
}
