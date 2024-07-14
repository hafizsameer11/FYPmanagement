<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperviserController extends Controller
{
    public function index()
    {
        $supervisors = Supervisor::with('user','student')->get();

        return view('supervisor.index', compact('supervisors'));
    }
    public function search(Request $request)  {
        $query = Supervisor::query();

        if ($request->filled('name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('spid')) {
            $query->where('spid', 'like', '%' . $request->spid . '%');
        }

        $supervisors = $query->with('user', 'supervisor.user', 'project')->get();
        return view('supervisor.index', compact('supervisors'));

    }

    public function create()
    {
        $projects=Project::all();
        return view('supervisor.create',compact('projects'));
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
            $supervisor = new Supervisor();
            $supervisor->user_id = $user->id;
            $supervisor->spid = $request->spid;
            $supervisor->expertarea = $request->expertarea;
            $supervisor->project_id=$request->project_id;

            $supervisor->save();
            if ($supervisor) {
                return redirect()->route('supervisor.index')->with('success', 'Supervisor Added Successfully');
            } else {
                return redirect()->route('supervisor.index')->with('error', 'Supervisor Not Added');
            }
        } else {
            return redirect()->route('supervisor.index')->with('error', 'Supervisor Not Added');
        }
    }

    public function edit($id)
    {
        $supervisor = Supervisor::find($id);
        return view('supervisor.edit', compact('supervisor'));
    }

    public function update(Request $request, $id)
    {
        $supervisor = Supervisor::find($id);
        $supervisor->spid = $request->spid;
        $supervisor->expertarea = $request->expertarea;
        $supervisor->project_id=$request->project_id;

        $supervisor->save();
        if ($supervisor) {
            return redirect()->route('supervisor.index')->with('success', 'Supervisor Updated Successfully');
        } else {
            return redirect()->route('supervisor.index')->with('error', 'Supervisor Not Updated');
        }
    }

    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);
        if ($supervisor) {
            $supervisor->delete();
            return redirect()->route('supervisor.index')->with('success', 'Supervisor Deleted Successfully');
        }
    }
}
