<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redacleaningservice;
use Illuminate\Support\Facades\File;

class RedacleaningserviceController extends Controller
{
    public function index()
    {
        $redacleaningservices = Redacleaningservice::orderBy('due_date', 'desc')->paginate(10); 
        return view('redacleaningservice.index', compact('redacleaningservices'));
    }

    public function create()
    {
        return view('redacleaningservice.create');
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
            $file->move(public_path('uploads/cleaningfiles'), $filename);
            $data['file_path'] = 'uploads/cleaningfiles/' . $filename;
        }

        Redacleaningservice::create($data);

        return redirect()->route('redacleaningservice.index')->with('success', 'Cleaning task added successfully!');
    }

    public function edit($id)
    {
        // Change variable to $item to match Blade view
        $item = Redacleaningservice::findOrFail($id);
        return view('redacleaningservice.edit', compact('item'));
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

        $redacleaningservice = Redacleaningservice::findOrFail($id);

        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            if ($redacleaningservice->file_path && File::exists(public_path($redacleaningservice->file_path))) {
                File::delete(public_path($redacleaningservice->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/cleaningfiles'), $filename);
            $data['file_path'] = 'uploads/cleaningfiles/' . $filename;
        }

        $redacleaningservice->update($data);

        return redirect()->route('redacleaningservice.index')->with('success', 'Cleaning task updated successfully!');
    }

    public function destroy($id)
    {
        $redacleaningservice = Redacleaningservice::findOrFail($id);

        if ($redacleaningservice->file_path && File::exists(public_path($redacleaningservice->file_path))) {
            File::delete(public_path($redacleaningservice->file_path));
        }

        $redacleaningservice->delete();

        return redirect()->route('redacleaningservice.index')->with('success', 'Cleaning task deleted successfully!');
    }
}
