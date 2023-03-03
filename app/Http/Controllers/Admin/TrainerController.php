<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TrainerDataTable;
use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class TrainerController extends Controller
{
    public function index(TrainerDataTable $dataTable)
    {
        return $dataTable->render('admin.trainers.index');
    }

    public function show(Trainer $trainer)
    {
        return view('admin.trainers.show', compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('admin.trainers.edit', compact('trainer'));
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return redirect()->route('admin.trainers.index')->with('success', 'Trainer Deleted Successfully');
    }

    public function updateStatus(Request $request, Trainer $trainer)
    {
        $trainer->update(['status'=>!$trainer->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.trainers.index');
    }

    public function updatePassword(Request $request, Trainer $trainer)
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

        $trainer->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.trainers.index');
    }
}
