<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->id() == 1)
        {
            $total_patient = count(Patient::all());

            $total_doctor = count(Doctor::all());

            $total_nurse = count(Nurse::all());

            $total_treatment = count(Treatment::all());
        }
        else
        {
            $total_patient = count(Patient::where('branch_id', auth()->user()->branch_id)->get());

            $total_doctor = count(Doctor::where('branch_id', auth()->user()->branch_id)->get());

            $total_nurse = count(Nurse::where('branch_id', auth()->user()->branch_id)->get());

            $total_treatment = count(Treatment::where('branch_id', auth()->user()->branch_id)->get());
        }
        return view('admin.dashboard', compact('total_patient', 'total_doctor', 'total_nurse', 'total_treatment'));
    }

    public function python()
    {
        $patient = Patient::where('id', 1)->first();

        $path = "C:\\Users\\pc\\PycharmProjects\\HandTracking\\PatientCallingHistory";
        
        // Create the file
        $filename = $path . '\\' . $patient->name . '.txt';
        File::put($filename, '');
    
        // Write content to the file
        $content = "Patient Name: " . $patient->name . "\r\nInstruction: ";
        File::put($filename, $content, FILE_APPEND);
    }
}
