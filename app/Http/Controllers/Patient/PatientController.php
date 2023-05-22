<?php

namespace App\Http\Controllers\Patient;

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

class PatientController extends Controller
{
    public function show(Patient $patient)
    {
        $patient_call = count(PatientCall::where('patient_id', auth()->id())->get());

        return view('patient.patients.show', compact('patient', 'patient_call'));
    }
}
