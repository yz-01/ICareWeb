<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminDataTable;
use App\Facade\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable)
    {
        $branch = Branch::all();

        return $dataTable->render('admin.admins.index', compact('branch'));
    }

    public function create()
    {
        $branch = Branch::all();

        return view('admin.admins.create', compact('branch'));
    }

    public function store(Request $request)
    {
        $admin_hq = Admin::withTrashed()->latest('id')->first();

        $admin = Admin::create([
            'branch_id' => $request->branch_id,
            'username' => $request->username,
            'name' => $request->name,
            'code' => $admin_hq->code,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $add_admin_code_number = substr($admin->code,-4) + 1;
        $admin->update([
            'code' => "A0".str_pad($add_admin_code_number, 4, '0', STR_PAD_LEFT),
        ]);
        // $roles = $request->role;
        // $admin->assignRole($roles);

        if($request->image)
        {
            $file = UploadImage::uploadAdminImage($request,$admin);
            $admin->update([ 'image' => $file ]);
        }
        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.admins.index');
    }

    public function show(Admin $admin)
    {
        $branch = Branch::all();

        return view('admin.admins.show', compact('admin', 'branch'));
    }

    public function edit(Admin $admin)
    {
        $branch = Branch::all();

        return view('admin.admins.edit', compact('admin', 'branch'));
    }

    public function update(Request $request, Admin $admin)
    {
        if($request->image)
        {
            $file = UploadImage::uploadAdminImage($request, $admin);
        }

        $admin->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image ? $file : null,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin Deleted Successfully');
    }

    public function updateStatus(Request $request, Admin $admin)
    {
        $admin->update(['status'=>!$admin->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.admins.index');
    }

    public function updatePassword(Request $request, Admin $admin)
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

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.admins.index');
    }
}
