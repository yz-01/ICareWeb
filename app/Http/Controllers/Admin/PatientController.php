<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PatientDataTable;
use App\Http\Controllers\Controller;
use App\Models\Paient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PatientController extends Controller
{
    public function index(PatientDataTable $dataTable)
    {
        return $dataTable->render('admin.patients.index');
    }

    public function show(Doctor $agent)
    {
        return view('admin.agents.show', compact('agent'));
    }

    public function edit(Doctor $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    public function destroy(Doctor $agent)
    {
        $agent->delete();

        return redirect()->route('admin.agents.index')->with('success', 'Agent Deleted Successfully');
    }

    public function updateStatus(Request $request, Doctor $agent)
    {
        $agent->update(['status'=>!$agent->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.agents.index');
    }

    public function updatePassword(Request $request, Doctor $agent)
    {
        $request->validate([
            'password' => [
                'required','string','confirmed',
                Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
            ],
        ]);

        $agent->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.agents.index');
    }
}
