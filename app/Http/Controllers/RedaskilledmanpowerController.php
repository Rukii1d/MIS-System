<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redaskilledmanpower;
use Illuminate\Support\Facades\File;

class RedaskilledmanpowerController extends Controller
{
    public function index()
    {
        $records = Redaskilledmanpower::orderBy('due_date', 'desc')->paginate(10); 
        return view('redaskilledmanpower.index', compact('records'));
    }

    public function create()
    {
        return view('redaskilledmanpower.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'complete_date' => 'nullable|date',
            'status' => 'required|in:Completed,Pending',
            'progress' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:20480',
        ]);

        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/skilledmanpowerfiles'), $filename);
            $data['file_path'] = 'uploads/skilledmanpowerfiles/' . $filename;
        }

        Redaskilledmanpower::create($data);

        return redirect()->route('redaskilledmanpower.index')->with('success', 'Skilled Manpower task added successfully!');
    }

    public function edit($id)
    {
        $redaskilledmanpower = Redaskilledmanpower::findOrFail($id);
        return view('redaskilledmanpower.edit', compact('redaskilledmanpower'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'complete_date' => 'nullable|date',
            'status' => 'required|in:Completed,Pending',
            'progress' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:20480',
        ]);

        $record = Redaskilledmanpower::findOrFail($id);
        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            if ($record->file_path && File::exists(public_path($record->file_path))) {
                File::delete(public_path($record->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/skilledmanpowerfiles'), $filename);
            $data['file_path'] = 'uploads/skilledmanpowerfiles/' . $filename;
        }

        $record->update($data);

        return redirect()->route('redaskilledmanpower.index')->with('success', 'Skilled Manpower task updated successfully!');
    }

    public function destroy($id)
    {
        $record = Redaskilledmanpower::findOrFail($id);

        if ($record->file_path && File::exists(public_path($record->file_path))) {
            File::delete(public_path($record->file_path));
        }

        $record->delete();

        return redirect()->route('redaskilledmanpower.index')->with('success', 'Skilled Manpower task deleted successfully!');
    }
}
