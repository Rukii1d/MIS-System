<?php

namespace App\Http\Controllers;

use App\Models\Redaenterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RedaenterpricseController extends Controller
{
    public function index()
    {
        $records = Redaenterprise::orderBy('due_date', 'desc')->paginate(10); 
        return view('enterprise.index', compact('records'));
    }

    public function create()
    {
        return view('enterprise.create');
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

        $data = $request->only(['task', 'due_date', 'complete_date', 'status', 'progress']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/enterprisefiles'), $filename);
            $data['file_path'] = 'uploads/enterprisefiles/' . $filename;
        }

        Redaenterprise::create($data);

        return redirect()->route('enterprise.index')->with('success', 'Task added successfully!');
    }

    public function edit($id)
    {
        $item = Redaenterprise::findOrFail($id);
        return view('enterprise.edit', compact('item'));
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

        $item = Redaenterprise::findOrFail($id);

        $data = $request->only(['task', 'due_date', 'complete_date', 'status', 'progress']);

        if ($request->hasFile('file')) {
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/enterprisefiles'), $filename);
            $data['file_path'] = 'uploads/enterprisefiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('enterprise.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redaenterprise::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('enterprise.index')->with('success', 'Task deleted successfully!');
    }
}
