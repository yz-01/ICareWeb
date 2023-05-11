<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DoctorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index(DoctorDataTable $dataTable)
    {
        $branch = Branch::all();

        return $dataTable->render('admin.doctors.index', compact('branch'));
    }

    public function create()
    {
        $branch = Branch::all();

        return view('admin.doctors.create', compact('branch'));
    }

    public function store(Request $request)
    {
        $doctor_hq = Doctor::withTrashed()->latest('id')->first();

        $doctor = Doctor::create([
            'branch_id' => $request->branch_id,
            'username' => $request->username,
            'name' => $request->name,
            'code' => $doctor_hq->code,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'area_of_experise' => $request->area_of_experise,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $add_doctor_code_number = substr($doctor->code,-4) + 1;
        $doctor->update([
            'code' => "D0".str_pad($add_doctor_code_number, 4, '0', STR_PAD_LEFT),
        ]);

        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $doctor->update([
                'image' => $file,
            ]);
        }
        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.doctors.index');
    }

    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $branch = Branch::all();

        return view('admin.doctors.edit', compact('doctor', 'branch'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $doctor->update([
                'image' => $file,
            ]);
        }

        $doctor->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'area_of_experise' => $request->area_of_experise,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.doctors.index');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Agent Deleted Successfully');
    }

    public function updateStatus(Request $request, Doctor $doctor)
    {
        $doctor->update(['status'=>!$doctor->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.doctors.index');
    }

    public function updatePassword(Request $request, Doctor $agent)
    {
        $request->validate([
            'password' => [
                'required','string','confirmed',
                Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
            ],
        ]);

        $agent->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.doctors.index');
    }
}
