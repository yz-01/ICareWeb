<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        return view('nurse.dashboard');
    }

    public function call(Request $request)
    {
        $patient = Patient::where('branch_id', auth()->user()->branch_id)->where('in_treatment', 1)->get();

        return view('nurse.call', compact('patient'));
    }

    public function callStore(Request $request)
    {
        $patient = Patient::where('id', $request->patient_id)->first();

        $treatment = Treatment::where('patient_id', $request->patient_id)->first();

        $path = "C:\\Users\\pc\\PycharmProjects\\HandTracking\\PatientCallingHistory";
        
        // Create the file
        $filename = $path . '\\' . $patient->name . '.txt';
        File::put($filename, '');
    
        // Write content to the file
        $content = "Patient Name: " . $patient->name . "\r\nRoom: " . $treatment->ward->room->room_number . "\r\nWard: " . $treatment->ward->ward_number . "\r\nInstruction: ";
        File::put($filename, $content, FILE_APPEND);

        $request->session()->flash('success', 'Created Successfully');

        return view('nurse.dashboard');
    }
}
