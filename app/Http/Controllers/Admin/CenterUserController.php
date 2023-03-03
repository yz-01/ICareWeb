<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CenterUserDataTable;
use App\Http\Controllers\Controller;
use App\Models\CenterUser;
use App\Models\PromoteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CenterUserController extends Controller
{
    public function index(CenterUserDataTable $dataTable)
    {
        return $dataTable->render('admin.center_users.index');
    }

    public function show(CenterUser $center_user)
    {
        $promote_product = PromoteProduct::where('center_user_id', $center_user->id)->first();
        return view('admin.center_users.show', compact('center_user', 'promote_product'));
    }

    public function edit(CenterUser $center_user)
    {
        return view('admin.center_users.edit', compact('center_user'));
    }

    public function destroy(CenterUser $center_user)
    {
        $center_user->delete();

        return redirect()->route('admin.center_users.index')->with('success', 'Center Deleted Successfully');
    }

    public function updateStatus(Request $request, CenterUser $center_user)
    {
        $center_user->update(['status'=>!$center_user->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.center_users.index');
    }

    public function updatePassword(Request $request, CenterUser $center_user)
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

        $center_user->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.center_users.index');
    }
}
