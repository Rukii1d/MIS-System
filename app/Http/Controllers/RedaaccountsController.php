<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redaaccounts;
use Illuminate\Support\Facades\File;

class RedaaccountsController extends Controller
{
    public function index()
    {
        $records = Redaaccounts::orderBy('due_date', 'desc')->paginate(10); 
        return view('redaaccounts.index', compact('records'));
    }

    public function create()
    {
        return view('redaaccounts.create');
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
            $file->move(public_path('uploads/accounts'), $filename);
            $data['file_path'] = 'uploads/accounts/' . $filename;
        }

        Redaaccounts::create($data);

        return redirect()->route('redaaccounts.index')->with('success', 'Account task added successfully!');
    }

    public function edit($id)
    {
            $record = Redaaccounts::findOrFail($id);
            return view('redaaccounts.edit', compact('record'));
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

        $item = Redaaccounts::findOrFail($id);

        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/accounts'), $filename);
            $data['file_path'] = 'uploads/accounts/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redaaccounts.index')->with('success', 'Account task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redaaccounts::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redaaccounts.index')->with('success', 'Account task deleted successfully!');
    }
}
