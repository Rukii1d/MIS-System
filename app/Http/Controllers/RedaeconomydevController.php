<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redaeconomydev;
use Illuminate\Support\Facades\File;

class RedaeconomydevController extends Controller
{
    public function index()
    {
        // Order by due_date descending
        $records = Redaeconomydev::orderBy('due_date', 'desc')->paginate(10); 
        return view('econdev.index', compact('records'));
    }

         public function create()
    {
        if (session()->get('type') !== 'Admin') {
            return redirect()->route('econdev.index')->with('error', 'Access denied.');
        }

        return view('econdev.create');
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
            $file->move(public_path('uploads/economyfiles'), $filename);
            $data['file_path'] = 'uploads/economyfiles/' . $filename;
        }

        Redaeconomydev::create($data);

        return redirect()->route('econdev.index')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $item = Redaeconomydev::findOrFail($id);
        return view('econdev.edit', compact('item'));
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

        $item = Redaeconomydev::findOrFail($id);

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
            $file->move(public_path('uploads/economyfiles'), $filename);
            $data['file_path'] = 'uploads/economyfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('econdev.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redaeconomydev::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('econdev.index')->with('success', 'Record deleted successfully!');
    }
}
