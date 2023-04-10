<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BranchDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    public function index(BranchDataTable $dataTable)
    {
        $city = City::all();

        $state = State::all();

        $country = Country::all();

        return $dataTable->render('admin.branches.index', compact('city', 'state', 'country'));
    }

    public function create()
    {
        $city = City::all();

        $state = State::all();

        $country = Country::all();

        return view('admin.branches.create', compact('city', 'state', 'country'));
    }

    public function store(Request $request)
    {
        $branch = Branch::create([
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'country_id' => 131,
            'name' => $request->name,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        
        if($request->logo)
        {
            $image = $request->file('logo');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $branch->update([
                'logo' => $file,
            ]);
        }

        if($request->logo_sm)
        {
            $image = $request->file('logo_sm');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $branch->update([
                'thumbnail_logo' => $file,
            ]);
        }

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.branches.index');
    }

    public function show(Branch $branch)
    {
        $city = City::all();

        $state = State::all();

        $country = Country::all();

        return view('admin.branches.show', compact('branch', 'city', 'state', 'country'));
    }

    public function edit(Branch $branch)
    {
        $city = City::all();

        $state = State::all();

        $country = Country::all();

        return view('admin.branches.edit', compact('branch', 'city', 'state', 'country'));
    }

    public function update(Request $request, Branch $branch)
    {
        $branch->update([
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'country_id' => 131,
            'name' => $request->name,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        
        if($request->logo)
        {
            $image = $request->file('logo');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $branch->update([
                'logo' => $file,
            ]);
        }

        if($request->logo_sm)
        {
            $image = $request->file('logo_sm');

            $file_name = Str::random(10);  // File name random;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $fileName);
            $file = "storage/images/" . $fileName;   // Get path to access image

            $branch->update([
                'thumbnail_logo' => $file,
            ]);
        }

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.branches.index');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('success', 'Branch Deleted Successfully');
    }

    public function updateStatus(Request $request, Branch $branch)
    {
        $branch->update(['status'=>!$branch->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.branches.index');
    }
}
