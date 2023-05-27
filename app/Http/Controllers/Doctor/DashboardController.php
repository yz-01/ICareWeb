<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Patient;
use App\Models\Schedule;
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
                ->orWhere('published_to', 2);
        })
            ->latest()
            ->first();

        return view('doctor.dashboard', compact('announcement'));
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
