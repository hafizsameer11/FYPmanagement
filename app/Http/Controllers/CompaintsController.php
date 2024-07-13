<?php

namespace App\Http\Controllers;

use App\Models\Compaint;
use Illuminate\Http\Request;

class CompaintsController extends Controller
{
    public function submit(){
        return view('complaint.studentside');
    }
    public function index()
    {
        $complaints = Compaint::with('user')->get();
        return view('complaint.index', compact('complaints'));
    }
    public function submitstore(Request $request){
        $complaint = new Compaint();
        $complaint->type = $request->type;
        $complaint->description = $request->description;
        $complaint->user_id = auth()->user()->id;
        $complaint->status ='Pending';

        $complaint->save();
        if($complaint){
            // return view('complaint.studentside');
            return redirect()->route('complaint.submit')->with('success', 'Complaint Added Successfully');
        }else{
            return redirect()->route('complaint.submit')->with('error', 'Complaint Not Added');

        }
    }

    public function create()
    {
        return view('complaint.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'nullable',
            'description' => 'nullable',
        ]);

        $complaint = new Compaint();
        $complaint->type = $request->type;
        $complaint->description = $request->description;
        $complaint->user_id = auth()->user()->id;
        $complaint->status = $request->status;
        $complaint->comments=$request->comments;
        $complaint->save();

        if ($complaint) {
            return redirect()->route('complaint.index')->with('success', 'Complaint Added Successfully');
        } else {
            return redirect()->route('complaint.index')->with('error', 'Complaint Not Added');
        }
    }

    public function edit($id)
    {
        $complaint = Compaint::find($id);
        return view('complaint.edit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $complaint=Compaint::find($id);
        if($complaint){
            $complaint->comment=$request->comment;
        }

        $complaint->save();

        if ($complaint) {
            return redirect()->route('complaint.index')->with('success', 'Complaint Updated Successfully');
        } else {
            return redirect()->route('complaint.index')->with('error', 'Complaint Not Updated');
        }
    }
    public function updateComment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string',
    ]);

    $complaint = Compaint::find($id);
    if ($complaint) {
        $complaint->comments = $request->comment;
        $complaint->save();
        return response()->json(['success' => true, 'message' => 'Comment updated successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Complaint not found'], 404);
    }
}
    public function resolve(Request $request, $id)
    {
        $complaint=Compaint::find($id);
        if($complaint){
            $complaint->status="Resolved";
        }
        $complaint->save();

        if ($complaint) {
            return redirect()->route('complaint.index')->with('success', 'Complaint Updated Successfully');
        } else {
            return redirect()->route('complaint.index')->with('error', 'Complaint Not Updated');
        }
    }

    public function destroy($id)
    {
        $complaint = Compaint::find($id);
        if ($complaint) {
            $complaint->delete();
            return redirect()->route('complaint.index')->with('success', 'Complaint Deleted Successfully');
        } else {
            return redirect()->route('complaint.index')->with('error', 'Complaint Not Found');
        }
    }
}
