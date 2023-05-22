<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PatientDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Paient;
use App\Models\Patient;
use App\Models\PatientCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PatientController extends Controller
{
    public function index(PatientDataTable $dataTable)
    {
        $branch = Branch::all();

        return $dataTable->render('admin.patients.index', compact('branch'));
    }

    public function create()
    {
        $branch = Branch::all();

        return view('admin.patients.create', compact('branch'));
    }

    public function store(Request $request)
    {
        $patient_hq = Patient::withTrashed()->latest('id')->first();

        $patient = Patient::create([
            'branch_id' => $request->branch_id,
            'username' => $request->username,
            'name' => $request->name,
            'code' => $patient_hq->code,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'nurse_call_application_id' => $request->nurse_call_application_id,
            'branch_id' => $request->branch_id,
        ]);
        $add_doctor_code_number = substr($patient->code,-4) + 1;
        $patient->update([
            'code' => "P0".str_pad($add_doctor_code_number, 4, '0', STR_PAD_LEFT),
        ]);

        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $patient->update([
                'image' => $file,
            ]);
        }

        $request->session()->flash('success', 'Created Successfully');
        

        return redirect()->route('admin.patients.index');
    }

    public function show(Patient $patient)
    {
        $patient_call = count(PatientCall::where('patient_id', $patient->id)->get());

        return view('admin.patients.show', compact('patient', 'patient_call'));
    }

    public function edit(Patient $patient)
    {
        $branch = Branch::all();

        return view('admin.patients.edit', compact('patient', 'branch'));
    }

    public function update(Request $request, Patient $patient)
    {
        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $patient->update([
                'image' => $file,
            ]);
        }

        $patient->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'nurse_call_application_id' => $request->nurse_call_application_id,
            'branch_id' => $request->branch_id,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('admin.patients.index')->with('success', 'Patient Deleted Successfully');
    }

    public function updateStatus(Request $request, Patient $patient)
    {
        $patient->update(['status'=>!$patient->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.patients.index');
    }

    public function updatePassword(Request $request, Patient $patient)
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

        $patient->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.patients.index');
    }
}
