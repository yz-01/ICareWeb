<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CompanyUserDataTable;
use App\Http\Controllers\Controller;
use App\Models\CompanyUser;
use App\Models\PromoteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CompanyUserController extends Controller
{
    public function index(CompanyUserDataTable $dataTable)
    {
        return $dataTable->render('admin.company_users.index');
    }

    public function show(CompanyUser $company_user)
    {
        $promote_product = PromoteProduct::where('company_user_id', $company_user->id)->first();
        return view('admin.company_users.show', compact('company_user', 'promote_product'));
    }

    public function edit(CompanyUser $company_user)
    {
        return view('admin.company_users.edit', compact('company_user'));
    }

    public function destroy(CompanyUser $company_user)
    {
        $company_user->delete();

        return redirect()->route('admin.company_users.index')->with('success', 'Company Deleted Successfully');
    }

    public function updateStatus(Request $request, CompanyUser $company_user)
    {
        $company_user->update(['status'=>!$company_user->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.company_users.index');
    }

    public function updatePassword(Request $request, CompanyUser $company_user)
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

        $company_user->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.company_users.index');
    }
}
