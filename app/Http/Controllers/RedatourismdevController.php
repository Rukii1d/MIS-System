<?php

namespace App\Http\Controllers;

use App\Models\Redatourismdev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RedatourismdevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Redatourismdev::orderBy('due_date', 'asc')->paginate(10); 
        return view('tourismdev.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
         public function create()
    {
        if (session()->get('type') !== 'Admin') {
            return redirect()->route('tourismdev.index')->with('error', 'Access denied.');
        }

        return view('tourismdev.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'complete_date' => 'nullable|date|after_or_equal:due_date',
            'status' => 'required|in:Completed,Pending',
            'progress' => 'nullable|string|max:50',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only(['task', 'due_date', 'complete_date', 'status', 'progress']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/tourismfiles'), $filename);
            $data['file_path'] = 'uploads/tourismfiles/' . $filename;
        }

        Redatourismdev::create($data);

        return redirect()->route('tourismdev.index')->with('success', 'Tourism task added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Redatourismdev::findOrFail($id);
        return view('tourismdev.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'complete_date' => 'nullable|date|after_or_equal:due_date',
            'status' => 'required|in:Completed,Pending',
            'progress' => 'nullable|string|max:50',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
        ]);

        $item = Redatourismdev::findOrFail($id);

        $data = $request->only(['task', 'due_date', 'complete_date', 'status', 'progress']);

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($item->file_path && File::exists(public_path($item->file_path))) {
                File::delete(public_path($item->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/tourismfiles'), $filename);
            $data['file_path'] = 'uploads/tourismfiles/' . $filename;
        }

        $item->update($data);

        return redirect()->route('tourismdev.index')->with('success', 'Tourism task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Redatourismdev::findOrFail($id);

        if ($item->file_path && File::exists(public_path($item->file_path))) {
            File::delete(public_path($item->file_path));
        }

        $item->delete();

        return redirect()->route('tourismdev.index')->with('success', 'Tourism task deleted successfully.');
    }
}
