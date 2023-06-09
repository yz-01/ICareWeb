<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NurseDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Merchant;
use App\Models\Nurse;
use App\Models\PromoteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class NurseController extends Controller
{
    public function index(NurseDataTable $dataTable)
    {
        $branch = Branch::all();

        return $dataTable->render('admin.nurses.index', compact('branch'));
    }

    public function create()
    {
        $branch = Branch::all();

        return view('admin.nurses.create', compact('branch'));
    }

    public function store(Request $request)
    {
        $nurse_hq = Nurse::withTrashed()->latest('id')->first();

        $nurse = Nurse::create([
            'branch_id' => $request->branch_id,
            'username' => $request->username,
            'name' => $request->name,
            'code' => $nurse_hq->code,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $add_nurse_code_number = substr($nurse->code,-4) + 1;
        $nurse->update([
            'code' => "N0".str_pad($add_nurse_code_number, 4, '0', STR_PAD_LEFT),
        ]);

        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $nurse->update([
                'image' => $file,
            ]);
        }
        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.nurses.index');
    }


    public function show(Nurse $nurse)
    {
        return view('admin.nurses.show', compact('nurse'));
    }

    public function edit(Nurse $nurse)
    {
        $branch = Branch::all();

        return view('admin.nurses.edit', compact('nurse', 'branch'));
    }

    public function update(Request $request, Nurse $nurse)
    {
        if($request->image)
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $nurse->update([
                'image' => $file,
            ]);
        }

        $nurse->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.nurses.index');
    }

    public function destroy(Nurse $nurse)
    {
        $nurse->delete();

        return redirect()->route('admin.nurses.index')->with('success', 'Nurse Deleted Successfully');
    }

    public function updateStatus(Request $request, Nurse $nurse)
    {
        $nurse->update(['status'=>!$nurse->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.nurses.index');
    }

    public function updatePassword(Request $request, Nurse $nurse)
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

        $nurse->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.nurses.index');
    }
}
