<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TreatmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class TreatmentController extends Controller
{
    public function index(TreatmentDataTable $dataTable)
    {
        return $dataTable->render('admin.treatments.index');
    }

    public function create()
    {
        $patient = Patient::where('status', 1)->get();

        $doctor = Doctor::all();

        $nurse = Nurse::all();

        $ward = Ward::where('status', 1)->get();

        return view('admin.treatments.create', compact('patient', 'doctor', 'nurse', 'ward'));
    }

    public function store(Request $request)
    {
        $announcement = Announcement::create([
            'branch_id' => $request->branch_id,
            'admin_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'published_to' => $request->published_to,
            'published_at' => $request->published_at,
        ]);

        if ($request->image) {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $announcement->update([
                'image' => $file,
            ]);
        }
        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.announcements.index');
    }

    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        $branch = Branch::all();

        return view('admin.announcements.edit', compact('announcement', 'branch'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        if ($request->image) {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $announcement->update([
                'image' => $file,
            ]);
        }

        $announcement->update([
            'branch_id' => $request->branch_id,
            'admin_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'published_to' => $request->published_to,
            'published_at' => $request->published_at,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.announcements.index');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement Deleted Successfully');
    }

    public function updateStatus(Request $request, Announcement $announcement)
    {
        $announcement->update(['status' => !$announcement->status]);

        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.announcements.index');
    }

    public function updatePassword(Request $request, Announcement $announcement)
    {
        $request->validate([
            'password' => [
                'required', 'string', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $announcement->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.announcements.index');
    }

    //AJAX
    public function getWardList(Request $request)
    {
        $branch = Patient::where('id', request()->input('patient_id'))->pluck('branch_id');

        $ward = Ward::where('branch_id', $branch)->where('status', 1)->pluck('ward_number');

        return response()->json(['branch' => $branch, 'ward' => $ward]);
    }
}
