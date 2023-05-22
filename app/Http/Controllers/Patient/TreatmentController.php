<?php

namespace App\Http\Controllers\Patient;

use App\DataTables\Patient\TreatmentDataTable;
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

class TreatmentController extends Controller
{
    public function index(TreatmentDataTable $dataTable)
    {
        $patient = Patient::all();

        $doctor = Doctor::all();

        $nurse = Nurse::all();

        $ward = Ward::all();

        return $dataTable->render('patient.treatments.index', compact('patient', 'doctor', 'nurse', 'ward'));
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

        return view('patient.treatments.show', compact('history', 'treatment', 'patient', 'doctor', 'nurse', 'ward', 'medicine', 'support_doctor', 'support_nurse', 'number_support_doctor', 'number_support_nurse'));
    }

    //Treatment History
    public function history(Request $request)
    {
        $treatment = $request->treatment_id;

        $history = History::where('treatment_id', $request->treatment_id)->where('status', 1)->get();

        $i = 1;

        return view('patient.treatments.history', compact('treatment', 'history', 'i'));
    }

    public function historyShow(Request $request)
    {
        $treatment = $request->treatment_id;

        $treatment_medicine = TreatmentMedicine::where('treatment_id', $request->treatment_id)->get();

        $medicine = Medicine::where('status', 1)->get();

        $history = History::where('id', $request->history_id)->first();

        $history_medicine = HistoryMedicine::where('history_id', $request->history_id)->get();

        return view('patient.treatments.historyShow', compact('history_medicine', 'treatment', 'treatment_medicine', 'medicine', 'history'));
    }
}
