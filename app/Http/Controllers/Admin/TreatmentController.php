<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TreatmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\SupportDoctor;
use App\Models\SupportNurse;
use App\Models\Treatment;
use App\Models\TreatmentMedicine;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class TreatmentController extends Controller
{
    public function index(TreatmentDataTable $dataTable)
    {
        $patient = Patient::all();

        $doctor = Doctor::all();

        $nurse = Nurse::all();

        $ward = Ward::all();

        return $dataTable->render('admin.treatments.index', compact('patient', 'doctor', 'nurse', 'ward'));
    }

    public function create()
    {
        $patient = Patient::where('status', 1)->get();

        $doctor = Doctor::all();

        $nurse = Nurse::all();

        $ward = Ward::where('status', 1)->get();

        $medicine = Medicine::where('status', 1)->get();

        return view('admin.treatments.create', compact('patient', 'doctor', 'nurse', 'ward', 'medicine'));
    }

    public function store(Request $request)
    {
        $patient = Patient::where('id', $request->patient_id)->update([
            'status' => 0,
        ]);

        $ward = Ward::where('id', $request->ward_id)->update([
            'status' => 0,
        ]);

        $treatment = Treatment::create([
            'patient_id' => $request->patient_id,
            'pic_doctor_id' => $request->pic_doctor_id,
            'pic_nurse_id' => $request->pic_nurse_id,
            'ward_id' => $request->ward_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        foreach ($request->support_doctor_id as $id => $support_doctor_ids) {
            $support_doctor = SupportDoctor::create([
                'treatment_id' => $treatment->id,
                'support_doctor_id' => $support_doctor_ids,
            ]);
        }

        foreach ($request->support_nurse_id as $id => $support_nurse_ids) {
            $support_nurse = SupportNurse::create([
                'treatment_id' => $treatment->id,
                'support_nurse_id' => $support_nurse_ids,
            ]);
        }

        foreach ($request->medicine_id as $id => $medicine_ids) {
            $i = 0;
            $treatment_medicine = TreatmentMedicine::create([
                'treatment_id' => $treatment->id,
                'medicine_id' => $medicine_ids,
                'usage_of_medicine' => $request->number[$i],
            ]);

            $medicine = Medicine::where('id', $medicine_ids)->first();

            $medicine->update([
                'number' => $medicine->number - $request->number[$i],
            ]);

            if ($medicine->number == 0) {
                $medicine->update([
                    'status' => 0,
                ]);
            }
            $i++;
        }

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.treatments.index');
    }

    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    public function edit(Treatment $treatment)
    {
        $patient = Patient::orWhere('status', 1)->orWhere('id', $treatment->patient_id)->get();

        $doctor = Doctor::all();

        $nurse = Nurse::all();

        $ward = Ward::orWhere('status', 1)->orWhere('id', $treatment->ward_id)->where('branch_id', $treatment->patient->branch_id)->get();

        $get_treatment_medicine = TreatmentMedicine::where('treatment_id', $treatment->id)->pluck('medicine_id');

        $medicine = Medicine::where(function ($query) use ($get_treatment_medicine) {
                $query->orWhere('status', 1)->orWhereIn('id', $get_treatment_medicine);
            })->where('branch_id', $treatment->patient->branch_id)->get();

        return view('admin.treatments.edit', compact('treatment', 'patient', 'doctor', 'nurse', 'ward', 'medicine'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        if ($request->image) {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $announcement->update([
                'image' => $file,
            ]);
        }

        $announcement->update([
            'branch_id' => $request->branch_id,
            'admin_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'published_to' => $request->published_to,
            'published_at' => $request->published_at,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.announcements.index');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement Deleted Successfully');
    }

    public function updateStatus(Request $request, Announcement $announcement)
    {
        $announcement->update(['status' => !$announcement->status]);

        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.announcements.index');
    }

    public function updatePassword(Request $request, Announcement $announcement)
    {
        $request->validate([
            'password' => [
                'required', 'string', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $announcement->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.announcements.index');
    }

    //AJAX
    public function getWardList(Request $request)
    {
        $branch = Patient::where('id', request()->input('patient_id'))->pluck('branch_id');

        $ward = Ward::where('branch_id', $branch)->where('status', 1)->get();

        foreach ($ward as $wards) {
            $room = $wards->room;
            $roomNumber = $room->room_number;
        }

        $medicine = Medicine::where('branch_id', $branch)->where('status', 1)->get();

        return response()->json(['branch' => $branch, 'ward' => $ward, 'medicine' => $medicine]);
    }

    public function deleteDataMedicine(Request $request)
    {
        $treatment_medicine = TreatmentMedicine::where('id', $request->id)->delete();

        return Redirect::back();
    }
}
