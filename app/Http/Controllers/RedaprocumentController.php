<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redaprocument;
use Illuminate\Support\Facades\File;

class RedaprocumentController extends Controller
{
    public function index()
    {
        $records = Redaprocument::orderBy('due_date', 'desc')->paginate(10); 
        return view('redaprocuments.index', compact('records'));
    }

    public function create()
    {
        return view('redaprocuments.create');
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
            $file->move(public_path('uploads/procuments'), $filename);
            $data['file_path'] = 'uploads/procuments/' . $filename;
        }

        Redaprocument::create($data);

        return redirect()->route('redaprocuments.index')->with('success', 'Procurement task added successfully!');
    }

    public function edit($id)
    {
        $record = Redaprocument::findOrFail($id);
        return view('redaprocuments.edit', compact('record'));
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

        $item = Redaprocument::findOrFail($id);
        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/procuments'), $filename);
            $data['file_path'] = 'uploads/procuments/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redaprocuments.index')->with('success', 'Procurement task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redaprocument::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redaprocuments.index')->with('success', 'Procurement task deleted successfully!');
    }
}
