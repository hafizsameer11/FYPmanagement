<?php

// app/Http/Controllers/DynamicTableController.php
namespace App\Http\Controllers;

use App\Models\DynamicTable;
use App\Models\DynamicTableRecord;
use Illuminate\Http\Request;

class DynamicTableController extends Controller
{
    public function index()
    {
        $tables = DynamicTable::with('records')->get();
        return view('examination.create', compact('tables'));
    }
    public function showform(){
        $tables = DynamicTable::with('records')->get();
        return view('examination.create', compact('tables'));
    }
    public function stshowform(){
        $tables = DynamicTable::with('records')->where('status','published')->get();
        return view('examination.student', compact('tables'));
    }

    public function store(Request $request)
    {
        $table = new DynamicTable();
        $table->name = $request->name;
        $table->headers = explode(',', $request->headerss);
        $table->save();

        return response()->json(['id' => $table->id, 'name' => $table->name, 'headers' => $table->headers]);
    }
    public function updateRecord(Request $request, $id)
    {
        $table = DynamicTable::findOrFail($id);

        // Get headers from the table
        $headers = $table->headers;


        // // Validate request data
        $validatedData = $request->validate([
            'records.*' => 'required|string|max:255', // Validate each record field
        ]);

        // // Create a new record for the table
        $newRecord = new DynamicTableRecord();

        // // Map validated records to the correct header fields
        $recordData = [];
        foreach ($headers as $header) {
            // Add each header's record value from validated data
            $recordData[$header] = $request[$header] ?? null;
        }

        // // Save record data
        $newRecord->records = $recordData;
        $newRecord->dynamic_table_id = $table->id; // Assign the table ID
        $newRecord->save();

        // Optionally, you can return the newly created record as JSON response
        return response()->json($newRecord);
    }
    public function publish($id){
        $table = DynamicTable::findOrFail($id);
        $table->status = 'published';
        $table->save();
        return response()->json(['success'=>'Published Successfully']);
    }
    public function destroy($id)
    {
        $table = DynamicTable::findOrFail($id);
        $table->delete();

        return response()->json(['success' => true]);
    }

    public function addRecord(Request $request, $id)
    {
        $table = DynamicTable::findOrFail($id);

        $record = [];
        foreach ($table->headers as $header) {
            $record[$header] = $request->input($header);
        }

        $table->records()->create(['records' => $record]);

        return response()->json($record);
    }
}
