<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redaitcenter;
use Illuminate\Support\Facades\File;

class RedaitcenterController extends Controller
{
    // Display all tasks
    public function index()
    {
        $records = Redaitcenter::orderBy('due_date', 'desc')->paginate(10); 
        return view('redaitcenter.index', compact('records'));
    }

    // Show create form
    public function create()
    {
        return view('redaitcenter.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'complete_date' => 'nullable|date|after_or_equal:due_date',
            'status' => 'required|in:Completed,Pending',
            'progress' => 'nullable|string|max:50',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:20480',
        ]);

        $data = [
            'task' => $request->task,
            'due_date' => $request->due_date,
            'complete_date' => $request->complete_date,
            'status' => $request->status,
            'progress' => $request->progress,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/itcenterfiles'), $filename);
            $data['file_path'] = 'uploads/itcenterfiles/' . $filename;
        }

        Redaitcenter::create($data);

        return redirect()->route('redaitcenter.index')->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $item = Redaitcenter::findOrFail($id);
        return view('redaitcenter.edit', compact('item'));
    }

    // Update task
    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'complete_date' => 'nullable|date|after_or_equal:due_date',
            'status' => 'required|in:Completed,Pending',
            'progress' => 'nullable|string|max:50',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:20480',
        ]);

        $item = Redaitcenter::findOrFail($id);

        $data = [
            'task' => $request->task,
            'due_date' => $request->due_date,
            'complete_date' => $request->complete_date,
            'status' => $request->status,
            'progress' => $request->progress,
        ];

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/itcenterfiles'), $filename);
            $data['file_path'] = 'uploads/itcenterfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redaitcenter.index')->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy($id)
    {
        $item = Redaitcenter::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redaitcenter.index')->with('success', 'Task deleted successfully!');
    }
}
