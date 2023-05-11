<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\MedicineDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class MedicineController extends Controller
{
    public function index(MedicineDataTable $dataTable)
    {
        $branch = Branch::all();

        return $dataTable->render('admin.medicines.index', compact('branch'));
    }

    public function create()
    {
        $branch = Branch::all();

        return view('admin.medicines.create', compact('branch'));
    }

    public function store(Request $request)
    {
        $medicine = Medicine::create([
            'supplier' => $request->supplier,
            'price' => $request->price,
            'code' => $request->code,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'number' => $request->number,
            'description' => $request->description,
        ]);

        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $medicine->update([
                'image' => $file,
            ]);
        }
        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.medicines.index');
    }

    public function show(Medicine $medicine)
    {
        $branch = Branch::all();

        return view('admin.medicines.show', compact('medicine', 'branch'));
    }

    public function edit(Medicine $medicine)
    {
        $branch = Branch::all();

        return view('admin.medicines.edit', compact('medicine', 'branch'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $medicine->update([
                'image' => $file,
            ]);
        }

        $medicine->update([
            'supplier' => $request->supplier,
            'price' => $request->price,
            'code' => $request->code,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'number' => $request->number,
            'description' => $request->description,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.medicines.index');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('admin.medicines.index')->with('success', 'Agent Deleted Successfully');
    }

    public function updateStatus(Request $request, Medicine $medicine)
    {
        $medicine->update(['status'=>!$medicine->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.medicines.index');
    }

    public function updatePassword(Request $request, Medicine $medicine)
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

        $medicine->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.medicines.index');
    }
}
