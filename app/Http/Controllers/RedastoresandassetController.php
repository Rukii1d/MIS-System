<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redastoresandasset;
use Illuminate\Support\Facades\File;

class RedastoresandassetController extends Controller
{
    public function index()
    {
        $records = Redastoresandasset::orderBy('due_date', 'desc')->paginate(10);
        return view('redastoresandasset.index', compact('records'));
    }

    public function create()
    {
        return view('redastoresandasset.create');
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
            $file->move(public_path('uploads/storesassetfiles'), $filename);
            $data['file_path'] = 'uploads/storesassetfiles/' . $filename;
        }

        Redastoresandasset::create($data);

        return redirect()->route('redastoresandasset.index')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $item = Redastoresandasset::findOrFail($id);
        return view('redastoresandasset.edit', compact('item'));
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

        $item = Redastoresandasset::findOrFail($id);

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
            $file->move(public_path('uploads/storesassetfiles'), $filename);
            $data['file_path'] = 'uploads/storesassetfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redastoresandasset.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redastoresandasset::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redastoresandasset.index')->with('success', 'Task deleted successfully!');
    }
}
