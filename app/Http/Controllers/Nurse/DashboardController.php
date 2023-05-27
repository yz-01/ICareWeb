<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\PatientCall;
use App\Models\Treatment;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $announcement = Announcement::where(function ($query) {
            $query->where('branch_id', auth()->user()->branch_id)
                ->orWhere('branch_id', null);
        })->where(function ($query) {
            $query->where('published_to', 1)
                ->orWhere('published_to', 3);
        })
            ->latest()
            ->first();

        return view('nurse.dashboard', compact('announcement'));
    }

    public function call(Request $request)
    {
        $patient = Patient::where('branch_id', auth()->user()->branch_id)->where('in_treatment', 1)->get();

        $nurse = Nurse::all();

        return view('nurse.call', compact('patient', 'nurse'));
    }

    public function callStore(Request $request)
    {
        $patient = Patient::where('id', $request->patient_id)->first();

        $treatment = Treatment::where('patient_id', $request->patient_id)->first();

        $patient_call = PatientCall::create([
            'patient_id' => $request->patient_id,
            'instruction' => $request->instruction,
            'date' => $request->date,
            'time' => $request->time,
            'nurse_id' => $request->nurse_id,
        ]);

        $path = "C:\\Users\\pc\\PycharmProjects\\HandTracking\\PatientCallingHistory";
        
        // Create the file
        $filename = $path . '\\' . $patient->name . '.txt';
        File::put($filename, '');
    
        // Write content to the file
        $content = "Patient Name: " . $patient->name . "\r\nRoom: " . $treatment->ward->room->room_number . "\r\nWard: " . $treatment->ward->ward_number . "\r\nInstruction: ";
        File::put($filename, $content, FILE_APPEND);

        $announcement = Announcement::where('branch_id', auth()->user()->branch_id)
        ->orWhere(function ($query) {
            $query->where('published_to', 1)
                ->orWhere('published_to', 3);
        })
        ->latest()
        ->first();

        $request->session()->flash('success', 'Created Successfully');

        return view('nurse.dashboard', compact('announcement'));
    }

    public function callList(Request $request)
    {
        $patient_call = PatientCall::where('nurse_id', auth()->id())->get();

        $i = 1;

        return view('nurse.callList', compact('patient_call', 'i'));
    }
}
