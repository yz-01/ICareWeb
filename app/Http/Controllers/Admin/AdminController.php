<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminDataTable;
use App\Facade\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('admin.admins.index');
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:255|unique:admins,deleted_at,NULL',
            'name' => 'required|string|max:255',
            'identity_card' => 'nullable|string|max:255|unique:admins,deleted_at,NULL',
            'phone' => 'nullable|numeric',
            'email' => 'required|string|email|max:255|unique:admins,deleted_at,NULL',
            'image' => 'nullable|max:8192',
            // 'role' => 'required|exists:roles,id',
            'password' => [
                'required','string','confirmed',
                Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
            ],
        ]);

        $admin_hq = Admin::withTrashed()->latest('id')->first();

        $admin = Admin::create([
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
        return view('admin.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'identity_card' => 'nullable|string|max:255|unique:admins,identity_card,' . $admin->id . ',id,deleted_at,NULL',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|string|email|max:255|unique:admins,email,' . $admin->id . ',id,deleted_at,NULL',
            'image' => 'nullable|max:8192',
        ]);

        if($request->image)
        {
            $file = UploadImage::uploadAdminImage($request, $admin);
        }

        $admin->update([
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
