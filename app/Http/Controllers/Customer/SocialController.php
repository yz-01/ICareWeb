<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function create()
    {
        $customer = Customer::where('id', auth()->user()->id)->first();

        return view('customer.social.create', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();

        $social = Social::where('customer_id', $id)->first();

        return view('customer.social.edit', compact('customer', 'social'));
    }

    public function store(Request $request)
    {
        $social = Social::create([
            'customer_id' => auth()->user()->id,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'website' => $request->website,
            'github' => $request->github,
        ]);

        $customer = Customer::where('id', $social->id)->first();

        $request->session()->flash('success', trans('Saved'));
        return view('customer.social.edit', compact('customer'));
    }

    public function update($id, Request $request)
    {
        $social = Social::where('customer_id', $id)->first();
        $social->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'website' => $request->website,
            'github' => $request->github,
        ]);

        $customer = Customer::where('id', $id)->first();

        $request->session()->flash('success', trans('Updated'));
        return view('customer.social.edit', compact('customer', 'social'));
    }
}
