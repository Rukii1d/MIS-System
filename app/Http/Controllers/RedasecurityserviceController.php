<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redasecurityservice;
use Illuminate\Support\Facades\File;

class RedasecurityserviceController extends Controller
{
    public function index()
    {
        $records = Redasecurityservice::orderBy('due_date', 'desc')->paginate(10); 
        return view('redasecurityservice.index', compact('records'));
    }

    public function create()
    {
        return view('redasecurityservice.create');
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
            $file->move(public_path('uploads/securityfiles'), $filename);
            $data['file_path'] = 'uploads/securityfiles/' . $filename;
        }

        Redasecurityservice::create($data);

        return redirect()->route('redasecurityservice.index')->with('success', 'Security task added successfully!');
    }

    public function edit($id)
    {
        $redasecurityservice = Redasecurityservice::findOrFail($id);
        return view('redasecurityservice.edit', compact('redasecurityservice'));
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

        $redasecurityservice = Redasecurityservice::findOrFail($id);

        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            if ($redasecurityservice->file_path && File::exists(public_path($redasecurityservice->file_path))) {
                File::delete(public_path($redasecurityservice->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/securityfiles'), $filename);
            $data['file_path'] = 'uploads/securityfiles/' . $filename;
        }

        $redasecurityservice->update($data);

        return redirect()->route('redasecurityservice.index')->with('success', 'Security task updated successfully!');
    }

    public function destroy($id)
    {
        $redasecurityservice = Redasecurityservice::findOrFail($id);

        if ($redasecurityservice->file_path && File::exists(public_path($redasecurityservice->file_path))) {
            File::delete(public_path($redasecurityservice->file_path));
        }

        $redasecurityservice->delete();

        return redirect()->route('redasecurityservice.index')->with('success', 'Security task deleted successfully!');
    }
}
