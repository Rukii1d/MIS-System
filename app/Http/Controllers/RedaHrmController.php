<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redahrm;
use App\Models\User;               // Add User model import
use Illuminate\Support\Facades\File;

class RedahrmController extends Controller
{
    public function index()
    {
        // Get logged-in user id from session (adjust if you store differently)
        $userId = session('user_id');

        // Find current user to get user type
        $currentUser = User::find($userId);

        // Fetch HRM records
        $records = Redahrm::orderBy('due_date', 'desc')->paginate(10); 

        // Pass HRM records and userType to the view
        return view('redahrm.index', [
            'records' => $records,
            'userType' => $currentUser ? $currentUser->type : null,
        ]);
    }

    public function create()
{
    if (session()->get('type') !== 'Admin') {
        return redirect()->route('redahrm.index')->with('error', 'Access denied.');
    }

    return view('redahrm.create');
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
            $file->move(public_path('uploads/hrmfiles'), $filename);
            $data['file_path'] = 'uploads/hrmfiles/' . $filename;
        }

        Redahrm::create($data);

        return redirect()->route('redahrm.index')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $item = Redahrm::findOrFail($id);
        return view('redahrm.edit', compact('item'));
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

        $item = Redahrm::findOrFail($id);

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
            $file->move(public_path('uploads/hrmfiles'), $filename);
            $data['file_path'] = 'uploads/hrmfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redahrm.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redahrm::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redahrm.index')->with('success', 'Record deleted successfully!');
    }
}
