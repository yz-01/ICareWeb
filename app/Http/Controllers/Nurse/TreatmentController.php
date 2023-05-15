<?php

namespace App\Http\Controllers\Nurse;

use App\DataTables\Nurse\TreatmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\History;
use App\Models\HistoryMedicine;
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
use Illuminate\Support\Facades\File;

class TreatmentController extends Controller
{
    public function index(TreatmentDataTable $dataTable)
    {
        $patient = Patient::all();

        $doctor = Doctor::all();

        $nurse = Nurse::all();

        $ward = Ward::all();

        return $dataTable->render('nurse.treatments.index', compact('patient', 'doctor', 'nurse', 'ward'));
    }

    public function create()
    {
        $patient = Patient::where('branch_id', auth()->user()->branch_id)->where('in_treatment', 0)->get();

        $doctor = Doctor::where('branch_id', auth()->user()->branch_id)->get();

        $nurse = Nurse::where('branch_id', auth()->user()->branch_id)->get();

        $ward = Ward::where('branch_id', auth()->user()->branch_id)->where('is_available', 1)->get();

        $medicine = Medicine::where('branch_id', auth()->user()->branch_id)->where('in_stock', 1)->get();

        return view('nurse.treatments.create', compact('patient', 'doctor', 'nurse', 'ward', 'medicine'));
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
                ]);
            }
        }

        $patient = Patient::where('id', $request->patient_id)->first();

        $path = "C:\\Users\\pc\\PycharmProjects\\HandTracking\\PatientCallingHistory";
        
        // Create the file
        $filename = $path . '\\' . $patient->name . '.txt';
        File::put($filename, '');
    
        // Write content to the file
        $content = "Patient Name: " . $patient->name . "\r\nRoom: " . $treatment->ward->room->room_number . "\r\nWard: " . $treatment->ward->ward_number . "\r\nInstruction: ";
        File::put($filename, $content, FILE_APPEND);

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('nurse.treatments.index');
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

        return view('nurse.treatments.show', compact('history', 'treatment', 'patient', 'doctor', 'nurse', 'ward', 'medicine', 'support_doctor', 'support_nurse', 'number_support_doctor', 'number_support_nurse'));
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

        $check_treatment = History::where('treatment_id', $treatment->id)->first();

        return view('nurse.treatments.edit', compact('check_treatment', 'treatment', 'patient', 'doctor', 'nurse', 'ward', 'medicine', 'support_doctor', 'support_nurse', 'number_support_doctor', 'number_support_nurse'));
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
                ]);
            }
        }

        $patient = Patient::where('id', $request->patient_id)->first();
        
        $path = "C:\\Users\\pc\\PycharmProjects\\HandTracking\\PatientCallingHistory";
        
        // Create the file
        $filename = $path . '\\' . $patient->name . '.txt';
        File::put($filename, '');
    
        // Write content to the file
        $content = "Patient Name: " . $patient->name . "\r\nRoom: " . $treatment->ward->room->room_number . "\r\nWard: " . $treatment->ward->ward_number . "\r\nInstruction: ";
        File::put($filename, $content, FILE_APPEND);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('nurse.treatments.index');
    }

    public function destroy(Treatment $treatment)
    {
        $support_doctor = SupportDoctor::where('treatment_id', $treatment->id)->delete();

        $support_nurse = SupportNurse::where('treatment_id', $treatment->id)->delete();

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $treatment->id)->delete();

        $treatment->delete();

        return redirect()->route('nurse.treatments.index')->with('success', 'Announcement Deleted Successfully');
    }

    //Treatment History
    public function history(Request $request)
    {
        $treatment = $request->treatment_id;

        $history = History::where('treatment_id', $request->treatment_id)->get();

        $i = 1;

        return view('nurse.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyCreate(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::where('in_stock', 1)->get();

        return view('nurse.treatments.historyCreate', compact('treatment', 'treatment_medicine', 'medicine'));
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

        foreach($request->medicine_id as $id => $medicine_ids)
        {
            $history_medicine = HistoryMedicine::create([
                'history_id' => $history->id,
                'medicine_id' => $medicine_ids,
                'last_time_usage_of_medicine' => $request->number_of_usage[$id],
                'usage_of_medicine' => $request->number_of_usage[$id],
            ]);

            $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->where('medicine_id', $medicine_ids)->first();

            $treatment_medicine->update([
                'total_usage' => $treatment_medicine->total_usage + $request->number_of_usage[$id],
            ]);

            $medicine = Medicine::where('id', $medicine_ids)->first();

            $medicine->update([
                'number' => $medicine->number - $request->number_of_usage[$id],
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

        $request->session()->flash('success', 'Created Successfully');

        return view('nurse.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyEdit(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::where('in_stock', 1)->get();

        $history = History::where('id', $request->history_id)->first();

        $history_medicine = HistoryMedicine::where('history_id', $request->history_id)->get();

        return view('nurse.treatments.historyEdit', compact('history_medicine', 'treatment', 'treatment_medicine', 'medicine', 'history'));
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

        foreach($request->medicine_id as $id => $medicine_ids)
        {
            $history_medicine = HistoryMedicine::where('history_id', $request->history_id)->where('medicine_id', $medicine_ids)->first();

            $last_time_usage_of_medicine = $history_medicine->last_time_usage_of_medicine;

            $history_medicine->update([
                'last_time_usage_of_medicine' => $request->number_of_usage[$id],
                'usage_of_medicine' => $request->number_of_usage[$id],
            ]);

            $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->where('medicine_id', $medicine_ids)->first();

            $treatment_medicine->update([
                'total_usage' => $treatment_medicine->total_usage + $request->number_of_usage[$id] - $last_time_usage_of_medicine,
            ]);

            $medicine = Medicine::where('id', $medicine_ids)->first();

            $medicine->update([
                'number' => $medicine->number + $last_time_usage_of_medicine - $request->number_of_usage[$id],
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

        $request->session()->flash('success', 'Update Successfully');

        return view('nurse.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyShow(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::all();

        $history = History::where('id', $request->history_id)->first();

        $history_medicine = HistoryMedicine::where('history_id', $request->history_id)->get();

        return view('nurse.treatments.historyShow', compact('history_medicine', 'treatment', 'treatment_medicine', 'medicine', 'history'));
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

        $request->session()->flash('success', 'Deleted Successfully');

        return Redirect::back();
    }

    public function deleteDataDoctor(Request $request)
    {
        $support_doctor = SupportDoctor::where('id', $request->id)->delete();

        $request->session()->flash('success', 'Deleted Successfully');

        return Redirect::back();
    }

    public function deleteDataNurse(Request $request)
    {
        $support_nurse = SupportNurse::where('id', $request->id)->delete();

        $request->session()->flash('success', 'Deleted Successfully');

        return Redirect::back();
    }
}
