<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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
