<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role=='hod'){
            $notices = Notice::with('user')->get();

            return view('noticeboard.index', compact('notices'));
        }else{
            $notices = Notice::with('user')->where('type',Auth::user()->role)->get();

            return view('noticeboard.student', compact('notices'));
        }
    }

    public function create()
    {
        return view('noticeboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->user_id = auth()->user()->id;
        $notice->staus='unread';
        $notice->save();

        if ($notice) {
            return redirect()->route('noticeboard.index')->with('success', 'Notice Added Successfully');
        } else {
            return redirect()->route('noticeboard.index')->with('error', 'Notice Not Added');
        }
    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('noticeboard.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->description = $request->description;

        $notice->save();

        if ($notice) {
            return redirect()->route('noticeboard.index')->with('success', 'Notice Updated Successfully');
        } else {
            return redirect()->route('noticeboard.index')->with('error', 'Notice Not Updated');
        }
    }

    public function destroy($id)
    {
        $notice = Notice::find($id);
        if ($notice) {
            $notice->delete();
            return redirect()->route('noticeboard.index')->with('success', 'Notice Deleted Successfully');
        } else {
            return redirect()->route('noticeboard.index')->with('error', 'Notice Not Found');
        }
    }
    public function getItemDescription($id)
    {
        $item = Notice::findOrFail($id);
        $item->staus="Read";
        $item->save();
        return response()->json(['description' => $item->description]);

    }
}
