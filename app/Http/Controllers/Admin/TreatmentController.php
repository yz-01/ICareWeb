<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TreatmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\History;
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
        $patient = Patient::where('branch_id', auth()->user()->branch_id)->where('in_treatment', 0)->get();

        $doctor = Doctor::where('branch_id', auth()->user()->branch_id)->get();

        $nurse = Nurse::where('branch_id', auth()->user()->branch_id)->get();

        $ward = Ward::where('is_available', 1)->get();

        $medicine = Medicine::where('in_stock', 1)->get();

        return view('admin.treatments.create', compact('patient', 'doctor', 'nurse', 'ward', 'medicine'));
    }

    public function store(Request $request)
    {
        $patient = Patient::where('id', $request->patient_id)->update([
            'in_treatment' => 1,
        ]);

        $ward = Ward::where('id', $request->ward_id)->update([
            'is_available' => 0,
        ]);

        $treatment = Treatment::create([
            'patient_id' => $request->patient_id,
            'pic_doctor_id' => $request->pic_doctor_id,
            'pic_nurse_id' => $request->pic_nurse_id,
            'ward_id' => $request->ward_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if($request->support_doctor_id)
        {
            foreach ($request->support_doctor_id as $id => $support_doctor_ids) {
                $support_doctor = SupportDoctor::create([
                    'treatment_id' => $treatment->id,
                    'support_doctor_id' => $support_doctor_ids,
                ]);
            }
        }

        if($request->support_nurse_id)
        {
            foreach ($request->support_nurse_id as $id => $support_nurse_ids) {
                $support_nurse = SupportNurse::create([
                    'treatment_id' => $treatment->id,
                    'support_nurse_id' => $support_nurse_ids,
                ]);
            }
        }

        if($request->medicine_id)
        {
            foreach ($request->medicine_id as $id => $medicine_ids) {
                $treatment_medicine = TreatmentMedicine::create([
                    'treatment_id' => $treatment->id,
                    'medicine_id' => $medicine_ids,
                    'usage_of_medicine' => 0,
                ]);
            }
        }

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.treatments.index');
    }

    public function show(Treatment $treatment)
    {
        $patient = Patient::orWhere('status', 1)->orWhere('id', $treatment->patient_id)->get();

        $doctor = Doctor::all();

        $support_doctor = SupportDoctor::where('treatment_id', $treatment->id)->get();

        $number_support_doctor = $support_doctor->count();

        $nurse = Nurse::all();

        $support_nurse = SupportNurse::where('treatment_id', $treatment->id)->get();

        $number_support_nurse = $support_nurse->count();

        $ward = Ward::orWhere('status', 1)->orWhere('id', $treatment->ward_id)->where('branch_id', $treatment->patient->branch_id)->get();

        $get_treatment_medicine = TreatmentMedicine::where('treatment_id', $treatment->id)->pluck('medicine_id');

        $medicine = Medicine::where(function ($query) use ($get_treatment_medicine) {
            $query->orWhere('status', 1)->orWhereIn('id', $get_treatment_medicine);
        })->where('branch_id', $treatment->patient->branch_id)->get();

        $history = History::where('treatment_id', $treatment->id)->get();

        return view('admin.treatments.show', compact('treatment', 'patient', 'doctor', 'nurse', 'ward', 'medicine', 'support_doctor', 'support_nurse', 'number_support_doctor', 'number_support_nurse', 'history'));
    }

    public function edit(Treatment $treatment)
    {
        $patient = Patient::orWhere('status', 1)->orWhere('id', $treatment->patient_id)->get();

        $doctor = Doctor::where('branch_id', auth()->user()->branch_id)->get();

        $support_doctor = SupportDoctor::where('treatment_id', $treatment->id)->get();

        $number_support_doctor = $support_doctor->count();

        $nurse = Nurse::where('branch_id', auth()->user()->branch_id)->get();

        $support_nurse = SupportNurse::where('treatment_id', $treatment->id)->get();

        $number_support_nurse = $support_nurse->count();

        $ward = Ward::orWhere('status', 1)->orWhere('id', $treatment->ward_id)->where('branch_id', $treatment->patient->branch_id)->get();

        $get_treatment_medicine = TreatmentMedicine::where('treatment_id', $treatment->id)->pluck('medicine_id');

        $medicine = Medicine::where(function ($query) use ($get_treatment_medicine) {
            $query->orWhere('status', 1)->orWhereIn('id', $get_treatment_medicine);
        })->where('branch_id', $treatment->patient->branch_id)->get();

        return view('admin.treatments.edit', compact('treatment', 'patient', 'doctor', 'nurse', 'ward', 'medicine', 'support_doctor', 'support_nurse', 'number_support_doctor', 'number_support_nurse'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $treatment->update([
            'title' => $request->title,
            'description' => $request->description,
            'ward_id' => $request->ward_id,
            'pic_doctor_id' => $request->pic_doctor_id,
            'pic_nurse_id' => $request->pic_nurse_id,
        ]);

        $last_time_ward_id = Ward::where('id', $request->last_time_ward_id)->update([
            'is_available' => 1,
        ]);

        $ward = Ward::where('id', $request->ward_id)->update([
            'is_available' => 0,
        ]);

        SupportDoctor::where('treatment_id', $treatment->id)->delete();

        if ($request->last_time_support_doctor_id) {
            foreach ($request->last_time_support_doctor_id as $last_time_support_doctor_ids) {
                SupportDoctor::create([
                    'treatment_id' => $treatment->id,
                    'support_doctor_id' => $last_time_support_doctor_ids,
                ]);
            }
        }

        if ($request->support_doctor_id) {
            foreach ($request->support_doctor_id as $support_doctor_ids) {
                SupportDoctor::create([
                    'treatment_id' => $treatment->id,
                    'support_doctor_id' => $support_doctor_ids,
                ]);
            }
        }

        SupportNurse::where('treatment_id', $treatment->id)->delete();

        if ($request->last_time_support_nurse_id) {
            foreach ($request->last_time_support_nurse_id as $last_time_support_nurse_ids) {
                SupportNurse::create([
                    'treatment_id' => $treatment->id,
                    'support_nurse_id' => $last_time_support_nurse_ids,
                ]);
            }
        }

        if ($request->support_nurse_id) {
            foreach ($request->support_nurse_id as $support_nurse_ids) {
                SupportNurse::create([
                    'treatment_id' => $treatment->id,
                    'support_nurse_id' => $support_nurse_ids,
                ]);
            }
        }

        if ($request->medicine_id) {
            foreach ($request->medicine_id as $id => $medicine_ids) {
                $treatment_medicine = TreatmentMedicine::create([
                    'treatment_id' => $treatment->id,
                    'medicine_id' => $medicine_ids,
                    'usage_of_medicine' => 0,
                ]);
            }
        }

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.treatments.index');
    }

    public function destroy(Treatment $treatment)
    {
        $support_doctor = SupportDoctor::where('treatment_id', $treatment->id)->delete();

        $support_nurse = SupportNurse::where('treatment_id', $treatment->id)->delete();

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $treatment->id)->delete();

        $treatment->delete();

        return redirect()->route('admin.treatments.index')->with('success', 'Announcement Deleted Successfully');
    }

    //Treatment History
    public function history(Request $request)
    {
        $treatment = $request->treatment_id;

        $history = History::where('treatment_id', $request->treatment_id)->get();

        $i = 1;

        return view('admin.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyCreate(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::where('in_stock', 1)->get();

        return view('admin.treatments.historyCreate', compact('treatment', 'treatment_medicine', 'medicine'));
    }

    public function historyStore(Request $request)
    {
        $history = History::create([
            'treatment_id' => $request->treatment_id,
            'title' => $request->title,
            'doctor_remark' => $request->doctor_remark,
            'nurse_remark' => $request->nurse_remark,
            'date' => $request->date,
            'time' => $request->time,
            'patient_healthy_status' => $request->patient_healthy_status,
        ]);

        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $history->update([
                'image' => $file,
            ]);
        }

        foreach($request->number_of_usage as $id => $number_of_usages)
        {
            $treatment_medicine = TreatmentMedicine::where('id', $id)->first();

            $usage_of_medicine = $treatment_medicine->usage_of_medicine;

            $treatment_medicine->update([
                'usage_of_medicine' => $number_of_usages,
            ]);

            $medicine = Medicine::where('id', $treatment_medicine->medicine_id)->first();

            $medicine->update([
                'number' => $medicine->number + $usage_of_medicine - $number_of_usages,
            ]);

            if($medicine->number == 0)
            {
                $medicine->update([
                    'in_stock' => 0,
                ]);
            }
        }

        $treatment = $request->treatment_id;

        $history = History::where('treatment_id', $request->treatment_id)->get();

        $i = 1;

        return view('admin.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyEdit(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::where('in_stock', 1)->get();

        $history = History::where('id', $request->history_id)->first();

        return view('admin.treatments.historyEdit', compact('treatment', 'treatment_medicine', 'medicine', 'history'));
    }

    public function historyUpdate(Request $request)
    {
        $history = History::where('id', $request->history_id)->first();

        $history->update([
            'title' => $request->title,
            'doctor_remark' => $request->doctor_remark,
            'nurse_remark' => $request->nurse_remark,
            'date' => $request->date,
            'time' => $request->time,
            'patient_healthy_status' => $request->patient_healthy_status,
        ]);

        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $history->update([
                'image' => $file,
            ]);
        }

        foreach($request->number_of_usage as $id => $number_of_usages)
        {
            $treatment_medicine = TreatmentMedicine::where('id', $id)->first();

            $usage_of_medicine = $treatment_medicine->usage_of_medicine;

            $treatment_medicine->update([
                'usage_of_medicine' => $number_of_usages,
            ]);

            $medicine = Medicine::where('id', $treatment_medicine->medicine_id)->first();

            $medicine->update([
                'number' => $medicine->number + $usage_of_medicine - $number_of_usages,
            ]);

            if($medicine->number == 0)
            {
                $medicine->update([
                    'in_stock' => 0,
                ]);
            }
        }

        $treatment = $request->treatment_id;

        $history = History::where('treatment_id', $request->treatment_id)->get();

        $i = 1;

        return view('admin.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyShow(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::all();

        $history = History::where('id', $request->history_id)->first();

        return view('admin.treatments.historyShow', compact('treatment', 'treatment_medicine', 'medicine', 'history'));
    }

    public function historyDelete(Request $request)
    {
        $history = History::where('id', $request->id)->delete();

        return Redirect::back();
    }

    //AJAX
    public function getWardList(Request $request)
    {
        $branch = Patient::where('id', request()->input('patient_id'))->pluck('branch_id');

        $ward = Ward::where('branch_id', $branch)->where('is_available', 1)->orderBy('room_id')->get();

        foreach ($ward as $wards) {
            $room = $wards->room;
            $roomNumber = $room->room_number;
        }

        $medicine = Medicine::where('branch_id', $branch)->where('in_stock', 1)->get();

        return response()->json(['branch' => $branch, 'ward' => $ward, 'medicine' => $medicine]);
    }

    public function deleteDataMedicine(Request $request)
    {
        $treatment_medicine = TreatmentMedicine::where('id', $request->id)->first();

        $medicine = Medicine::where('id', $treatment_medicine->medicine_id)->first();

        $medicine->update([
            'number' => $medicine->number + $treatment_medicine->usage_of_medicine,
        ]);

        if($medicine->number > 0)
        {
            $medicine->update([
                'in_stock' => 1,
            ]);
        }

        $treatment_medicine->delete();

        return Redirect::back();
    }

    public function deleteDataDoctor(Request $request)
    {
        $support_doctor = SupportDoctor::where('id', $request->id)->delete();

        return Redirect::back();
    }

    public function deleteDataNurse(Request $request)
    {
        $support_nurse = SupportNurse::where('id', $request->id)->delete();

        return Redirect::back();
    }
}
