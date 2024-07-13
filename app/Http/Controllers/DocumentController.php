<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('student','supervisor')->latest()->get();
        $students=Student::all();
        return view('document.index', compact('documents','students'));
    }
    public function view($id)
    {
        $document = Document::find($id);

        if (!$document) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        // Determine the URL or file path where the document can be viewed/downloaded
        $filePath = public_path('uploads/documents/' . $document->file);

        // Return a view or a redirect to the document URL
        return redirect()->away($filePath);
    }

    public function create()
    {
        $students = Student::with('user')->get(); // Fetch all students
        return view('document.create', compact('students'));
    }

    public function store(Request $request)

    {
        // dd($request->all());
        $request->validate([
            'student_id' => 'required',
            'document_type' => 'required',
            'file' => 'required', // Example validation for file upload
        ]);

        $document = new Document();


        $document->user_id=Auth::user()->id;
        $document->student_id = $request->student_id; // Assign student_id instead of project_id
        $document->document_type = $request->document_type;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/documents'), $fileName);
            $document->file = $fileName;
        }

        $document->status = 'pending'; // Default status
        $document->save();

        if ($document) {
            return redirect()->route('document.index')->with('success', 'Document Added Successfully');
        } else {
            return redirect()->route('document.index')->with('error', 'Document Not Added');
        }
    }

    public function edit($id)
    {
        $document = Document::find($id);
        $students = Student::all(); // Fetch all students
        return view('document.edit', compact('document', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'document_type' => 'required',
            'file' => 'nullable|mimes:pdf,docx|max:2048', // Example validation for file upload
        ]);

        $document = Document::find($id);
        $document->student_id = $request->student_id;
        $document->status="pending";
        $document->document_type = $request->document_type;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/documents'), $fileName);
            $document->file = $fileName;
        }
        $document->save();

        if ($document) {
            return redirect()->route('document.index')->with('success', 'Document Updated Successfully');
        } else {
            return redirect()->route('document.index')->with('error', 'Document Not Updated');
        }
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        if ($document) {
            $document->delete();
            return redirect()->route('document.index')->with('success', 'Document Deleted Successfully');
        } else {
            return redirect()->route('document.index')->with('error', 'Document Not Found');
        }
    }
    public function approve($id)
    {
        $document = Document::find($id);

        if (!$document) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        // Update document status to 'approved'
        $document->status = 'approved';
        $document->save();

        return redirect()->back()->with('success', 'Document Approved Successfully');
    }

    public function unapprove($id)
    {
        $document = Document::find($id);

        if (!$document) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        // Update document status to 'pending' or any appropriate status
        $document->status = 'pending'; // Assuming 'pending' is the default or unapproved status
        $document->save();

        return redirect()->back()->with('success', 'Document Unapproved Successfully');
    }
}
