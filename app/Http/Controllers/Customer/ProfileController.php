<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return view('customer.profile.index');
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();

        $countries = Country::all();

        $social = Social::where('customer_id', $id)->first();

        return view('customer.profile.edit', compact('customer', 'countries', 'social'));
    }

    public function update($id, Request $request)
    {
        $customer = Customer::where('id', $id)->first();

        $countries = Country::all();

        $social = Social::where('customer_id', $id)->first();

        $customer->update([
            'name' => $request->name,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country_id' => $request->country_id,
            'employment_status' => $request->employment_status,
            'company_name' => $request->company_name,
            'position' => $request->position,
        ]);

        if($request->file('image'))
        {
            $image = $request->file('image');

            $file_name = Str::random(10);  // File name random;
            $fileName = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/". $fileName;   // Get path to access image

            $customer ->update([
                'image' => $file,
            ]);
        }

        if($request->file('banner'))
        {
            $banner = $request->file('banner');

            $file_name = Str::random(10);  // File name random;
            $fileName = $file_name . '.' . $banner->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('banners', $banner, $fileName);
            $file = "storage/banners/". $fileName;   // Get path to access image

            $customer ->update([
                'banner' => $file,
            ]);
        }

        $request->session()->flash('success', trans('Updated'));
        return view('customer.profile.edit', compact('customer', 'countries', 'social'));
    }

    public function editPassword($id)
    {
        $customer = Customer::where('id', $id)->first();

        $social = Social::where('customer_id', $id)->first();

        return view('customer.profile.editPassword', compact('customer', 'social'));
    }

    public function updatePassword($id, Request $request)
    {
        $customer = Customer::where('id', $id)->first();

        $social = Social::where('customer_id', $id)->first();

        if (Hash::check($request->currentpassword, $customer->password))
        {
            if($request->newpassword == $request->retypenewpassword)
            {
                $customer->update([
                    'password' => Hash::make($request->newpassword),
                ]);

                $request->session()->flash('success', trans('Updated'));
                return view('customer.profile.editPassword', compact('customer', 'social'));
            }
            else
            {
                $request->session()->flash('warning', trans('Please make sure new password same with retype password'));
                return view('customer.profile.editPassword', compact('customer', 'social'));
            }
        }
        else
        {
            $request->session()->flash('warning', trans('Please enter correct password'));
            return view('customer.profile.editPassword', compact('customer', 'social'));
        }
    }
}
