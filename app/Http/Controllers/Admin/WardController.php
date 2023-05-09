<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\WardDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\State;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class WardController extends Controller
{
    public function index(WardDataTable $dataTable)
    {
        $branch = Branch::all();

        $room = Room::all();

        return $dataTable->render('admin.wards.index', compact('branch', 'room'));
    }

    public function create(Request $request)
    {
        $get_room_id = Room::where('id', $request->room_id)->first();

        $branch = Branch::where('id', $get_room_id->branch_id)->get();

        $room = Room::where('id', $request->room_id)->get();

        return view('admin.wards.create', compact('branch', 'room'));
    }

    public function store(Request $request)
    {
        $ward = Ward::create([
            'room_id' => $request->room_id,
            'ward_number' => $request->ward_number,
        ]);

        $room = Room::where('id', $request->room_id)->first();

        $ward->update([
            'branch_id' => $room->branch_id,
        ]);

        $room->update([
            'available_number' => $room->available_number - 1,
        ]);
        
        if($room->available_number == 0)
        {
            $room->update([
                'status' => 0,
            ]);
        }

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.rooms.index');
    }

    public function show(Room $room)
    {
        $branch = Branch::all();

        $room_type = RoomType::all();

        return view('admin.rooms.show', compact('branch', 'room_type', 'room'));
    }

    public function edit(Ward $ward)
    {
        $branch = Branch::all();

        $room = Room::where()->where('available_number', '!=', 0)->get();

        return view('admin.wards.edit', compact('branch', 'room', 'ward'));
    }

    public function update(Request $request, Room $room)
    {
        $room->update([
            'floor' => $request->floor,
            'room_number' => $request->room_number,
            'room_type_id' => $request->room_type_id,
            'branch_id' => $request->branch_id,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.rooms.index');
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Ward Deleted Successfully');
    }

    public function updateStatus(Request $request, Room $room)
    {
        $room->update(['status' => !$room->status]);

        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.rooms.index');
    }

    //AJAX
    public function getRoomList(Request $request)
    {
        $room = Room::where('branch_id', request()->input('branch_id'))->where('available_number', '!=', 0)->get();

        return response()->json(['room' => $room]);
    }

    public function deleteDataWard(Request $request)
    {
        $ward = Ward::where('id', request()->input('id'))->delete();

        $room = Room::where('id', request()->input('room_id'))->first();

        $room->update([
            'available_number' => $room->available_number + 1,
        ]);

        if($room->available_number != 0)
        {
            $room->update([
                'status' => 1,
            ]);
        }

        return redirect()->route('admin.rooms.index')->with('success', 'Ward Deleted Successfully');
    }
}
