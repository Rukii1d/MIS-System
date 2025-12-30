<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redasalary;
use Illuminate\Support\Facades\File;

class RedasalaryController extends Controller
{
    public function index()
    {
        $records = Redasalary::orderBy('due_date', 'desc')->paginate(10);
        return view('redasalary.index', compact('records'));
    }

    public function create()
    {
        return view('redasalary.create');
    }

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

        $data = $request->only(['task', 'due_date', 'complete_date', 'status', 'progress']);

        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/salaryfiles'), $filename);
            $data['file_path'] = 'uploads/salaryfiles/' . $filename;
        }

        Redasalary::create($data);

        return redirect()->route('redasalary.index')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $item = Redasalary::findOrFail($id);
        return view('redasalary.edit', compact('item'));
    }

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

        $item = Redasalary::findOrFail($id);

        $data = $request->only(['task', 'due_date', 'complete_date', 'status', 'progress']);

        if ($request->hasFile('file')) {
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/salaryfiles'), $filename);
            $data['file_path'] = 'uploads/salaryfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redasalary.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redasalary::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redasalary.index')->with('success', 'Task deleted successfully!');
    }
}
