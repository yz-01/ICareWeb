<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\MerchantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\PromoteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MerchantController extends Controller
{
    public function index(MerchantDataTable $dataTable)
    {
        return $dataTable->render('admin.merchants.index');
    }

    public function show(Merchant $merchant)
    {
        $promote_product = PromoteProduct::where('merchant_id', $merchant->id)->first();
        return view('admin.merchants.show', compact('merchant', 'promote_product'));
    }

    public function edit(Merchant $merchant)
    {
        return view('admin.merchants.edit', compact('merchant'));
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();

        return redirect()->route('admin.merchants.index')->with('success', 'Merchant Deleted Successfully');
    }

    public function updateStatus(Request $request, Merchant $merchant)
    {
        $merchant->update(['status'=>!$merchant->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.merchants.index');
    }

    public function updatePassword(Request $request, Merchant $merchant)
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

        $merchant->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.merchants.index');
    }
}
