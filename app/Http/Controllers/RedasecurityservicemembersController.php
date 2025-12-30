<?php

namespace App\Http\Controllers;

use App\Models\Redasecurityservicemember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RedasecurityservicemembersController extends Controller
{
    public function index()
    {
        $records = Redasecurityservicemember::latest()->paginate(10); 
        return view('redasecurityservicemembers.index', compact('records'));
    }

    public function create()
    {
        return view('redasecurityservicemembers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'etf_no' => 'required|unique:reda_security_service_members,etf_no',
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:MALE,FEMALE',
            'nationality' => 'required|in:SINHALA,TAMIL,ISLAMIC,CATHOLIC,CHRISTIAN',
            'nic_no' => 'required|unique:reda_security_service_members,nic_no',
            'address' => 'required|string',
            'workplace' => 'required|string',
            'salary_bank_branch_no' => 'required|string',
            'acc_no' => 'required|string',
            'telephone' => 'required|string',
            'picture' => 'nullable|image|max:2048',
            'date_joined' => 'required|date',
            'date_resigned' => 'nullable|date',
            'ds_division' => 'required|string',
            'gn_division' => 'required|string',
            'police_division' => 'required|string',
            'marital_status' => 'required|in:SINGLE,MARRIED',
            'spouse_name' => 'nullable|string',
            'no_of_children' => 'required|integer|min:0',
            'education_qualifications' => 'required|string',
            'experience' => 'required|string',
            'position_category' => 'required|in:LSO,SO,OIC',
        ]);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/members'), $filename);
            $data['picture'] = $filename;
        }

        Redasecurityservicemember::create($data);

        return redirect()->route('redasecurityservicemembers.index')
            ->with('success', 'Member added successfully.');
    }

    public function edit($id)
    {
        $member = Redasecurityservicemember::findOrFail($id);
        return view('redasecurityservicemembers.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $record = Redasecurityservicemember::findOrFail($id);

        $data = $request->validate([
            'etf_no' => 'required|unique:reda_security_service_members,etf_no,' . $record->id,
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:MALE,FEMALE',
            'nationality' => 'required|in:SINHALA,TAMIL,ISLAMIC,CATHOLIC,CHRISTIAN',
            'nic_no' => 'required|unique:reda_security_service_members,nic_no,' . $record->id,
            'address' => 'required|string',
            'workplace' => 'required|string',
            'salary_bank_branch_no' => 'required|string',
            'acc_no' => 'required|string',
            'telephone' => 'required|string',
            'picture' => 'nullable|image|max:2048',
            'date_joined' => 'required|date',
            'date_resigned' => 'nullable|date',
            'ds_division' => 'required|string',
            'gn_division' => 'required|string',
            'police_division' => 'required|string',
            'marital_status' => 'required|in:UNMARRIED,MARRIED',
            'spouse_name' => 'nullable|string',
            'no_of_children' => 'required|integer|min:0',
            'education_qualifications' => 'required|string',
            'experience' => 'required|string',
            'position_category' => 'required|in:LSO,SO,OIC',
        ]);

        if ($request->hasFile('picture')) {
            if ($record->picture) {
                $oldPath = public_path('uploads/members/' . $record->picture);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('picture');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/members'), $filename);
            $data['picture'] = $filename;
        }

        $record->update($data);

        return redirect()->route('redasecurityservicemembers.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy($id)
    {
        $record = Redasecurityservicemember::findOrFail($id);

        if ($record->picture) {
            $path = public_path('uploads/members/' . $record->picture);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $record->delete();

        return redirect()->route('redasecurityservicemembers.index')
            ->with('success', 'Member deleted successfully.');
    }
}
