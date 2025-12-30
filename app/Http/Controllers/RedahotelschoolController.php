<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redahotelschool;
use Illuminate\Support\Facades\File;

class RedahotelschoolController extends Controller
{
    public function index()
    {
        $records = Redahotelschool::orderBy('due_date', 'desc')->paginate(10); 
        return view('redahotelschool.index', compact('records'));
    }

    public function create()
    {
        return view('redahotelschool.create');
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
            $file->move(public_path('uploads/hotelschoolfiles'), $filename);
            $data['file_path'] = 'uploads/hotelschoolfiles/' . $filename;
        }

        Redahotelschool::create($data);

        return redirect()->route('redahotelschool.index')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $item = Redahotelschool::findOrFail($id);
        return view('redahotelschool.edit', compact('item'));
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

        $item = Redahotelschool::findOrFail($id);

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
            $file->move(public_path('uploads/hotelschoolfiles'), $filename);
            $data['file_path'] = 'uploads/hotelschoolfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redahotelschool.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redahotelschool::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redahotelschool.index')->with('success', 'Record deleted successfully!');
    }
}
