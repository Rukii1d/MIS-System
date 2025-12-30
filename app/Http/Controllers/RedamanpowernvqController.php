<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redamanpowernvq;
use Illuminate\Support\Facades\File;

class RedamanpowernvqController extends Controller
{
    public function index()
    {
        $records = Redamanpowernvq::orderBy('due_date', 'desc')->paginate(10); 
        return view('redamanpowernvq.index', compact('records'));
    }

    public function create()
    {
        return view('redamanpowernvq.create');
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
            $file->move(public_path('uploads/manpowerfiles'), $filename);
            $data['file_path'] = 'uploads/manpowerfiles/' . $filename;
        }

        Redamanpowernvq::create($data);

        return redirect()->route('redamanpowernvq.index')->with('success', 'Manpower task added successfully!');
    }

    public function edit($id)
    {
        $item = Redamanpowernvq::findOrFail($id);
        return view('redamanpowernvq.edit', compact('item'));
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

        $item = Redamanpowernvq::findOrFail($id);

        $data = $request->only('task', 'due_date', 'complete_date', 'status', 'progress');

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/manpowerfiles'), $filename);
            $data['file_path'] = 'uploads/manpowerfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('redamanpowernvq.index')->with('success', 'Manpower task updated successfully!');
    }

    public function destroy($id)
    {
        $item = Redamanpowernvq::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('redamanpowernvq.index')->with('success', 'Manpower task deleted successfully!');
    }
}
