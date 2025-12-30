<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redaauditmgt;
use Illuminate\Support\Facades\File;

class RedaauditmgtController extends Controller
{
    public function index()
    {
        $records = Redaauditmgt::orderBy('due_date', 'desc')->paginate(10); 
        return view('auditmgt.index', compact('records'));
    }

  public function create()
{
    if (session()->get('type') !== 'Admin') {
        return redirect()->route('auditmgt.index')->with('error', 'Access denied.');
    }

    return view('auditmgt.create');
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
            $file->move(public_path('uploads/auditfiles'), $filename);
            $data['file_path'] = 'uploads/auditfiles/' . $filename;
        }

        Redaauditmgt::create($data);

        return redirect()->route('auditmgt.index')->with('success', 'Audit task added successfully!');
    }

    public function edit($id)
    {
        $item = Redaauditmgt::findOrFail($id);
        return view('auditmgt.edit', compact('item'));
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

        $item = Redaauditmgt::findOrFail($id);

        $data = [
            'task' => $request->task,
            'due_date' => $request->due_date,
            'complete_date' => $request->complete_date,
            'status' => $request->status,
            'progress' => $request->progress,
        ];

        if ($request->hasFile('file')) {
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/auditfiles'), $filename);
            $data['file_path'] = 'uploads/auditfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('auditmgt.index')->with('success', 'Audit task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redaauditmgt::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('auditmgt.index')->with('success', 'Audit task deleted successfully!');
    }
}
