<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redalanguagecenter;
use Illuminate\Support\Facades\File;

class RedalanguagecenterController extends Controller
{
    public function index()
    {
        $records = Redalanguagecenter::orderBy('due_date', 'desc')->paginate(10); 
        return view('redalanguagecenter.index', compact('records'));
    }

    public function create()
    {
        return view('redalanguagecenter.create');
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
            $file->move(public_path('uploads/languagecenterfiles'), $filename);
            $data['file_path'] = 'uploads/languagecenterfiles/' . $filename;
        }

        Redalanguagecenter::create($data);

        return redirect()->route('redalanguagecenter.index')->with('success', 'Task added successfully!');
    }

    public function edit($id)
    {
        $item = Redalanguagecenter::findOrFail($id);
        return view('redalanguagecenter.edit', compact('item'));
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

        $item = Redalanguagecenter::findOrFail($id);

        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/languagecenterfiles'), $filename);
            $data['file_path'] = 'uploads/languagecenterfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redalanguagecenter.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redalanguagecenter::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redalanguagecenter.index')->with('success', 'Task deleted successfully!');
    }
}
