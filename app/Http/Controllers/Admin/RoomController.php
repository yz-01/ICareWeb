<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoomDataTable;
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

class RoomController extends Controller
{
    public function index(RoomDataTable $dataTable)
    {
        $branch = Branch::all();

        $room_type = RoomType::all();

        return $dataTable->render('admin.rooms.index', compact('branch', 'room_type'));
    }

    public function create()
    {
        $branch = Branch::all();

        $room_type = RoomType::all();

        return view('admin.rooms.create', compact('branch', 'room_type'));
    }

    public function store(Request $request)
    {
        $room_type = RoomType::where('id', $request->room_type_id)->first();

        $room = Room::create([
            'floor' => $request->floor,
            'room_number' => $request->room_number,
            'room_type_id' => $request->room_type_id,
            'branch_id' => $request->branch_id,
            'max_number' => $room_type->max_number,
            'available_number' => $room_type->max_number,
        ]);

        $j=1;

        for($i=0; $i<$room_type->max_number; $i++)
        {
            $ward = Ward::create([
                'branch_id' => $request->branch_id,
                'room_id' => $room->id,
                'ward_number' => $request->room_number . '-' . $j,
            ]);

            $j++;
        }

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.rooms.index');
    }

    public function show(Room $room)
    {
        $branch = Branch::all();

        $room_type = RoomType::all();

        $ward = Ward::where('room_id', $room->id)->get();

        return view('admin.rooms.show', compact('branch', 'room_type', 'room', 'ward'));
    }

    public function edit(Room $room)
    {
        $branch = Branch::all();

        $room_type = RoomType::all();

        $ward = Ward::where('room_id', $room->id)->get();

        return view('admin.rooms.edit', compact('branch', 'room_type', 'room', 'ward'));
    }

    public function update(Request $request, Room $room)
    {
        $room->update([
            'floor' => $request->floor,
            'room_number' => $request->room_number,
            'branch_id' => $request->branch_id,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('admin.rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room Deleted Successfully');
    }

    public function updateStatus(Request $request, Room $room)
    {
        $room->update(['status'=>!$room->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.rooms.index');
    }

    public function roomTypeCreate()
    {
        return view('admin.rooms.roomTypeCreate');
    }

    public function roomTypeStore(Request $request)
    {
        $room_type = RoomType::create([
            'name' => $request->name,
            'max_number' => $request->max_number,
        ]);

        return redirect()->route('admin.roomTypes.index');
    }

    public function roomTypeEdit(Request $request)
    {
        $room_type = RoomType::where('id', $request->id)->first();

        return view('admin.rooms.roomTypeEdit', compact('room_type'));
    }

    public function roomTypeUpdate(Request $request)
    {
        $room_type = RoomType::where('id', $request->id)->first();

        $room_type->update([
            'name' => $request->name,
            'max_number' => $request->max_number,
        ]);

        return redirect()->route('admin.roomTypes.index');
    }

    public function roomTypeShow(Request $request)
    {
        $room_type = RoomType::where('id', $request->id)->first();

        return view('admin.rooms.roomTypeShow', compact('room_type'));
    }

    public function roomTypeDelete(Request $request)
    {
        $room_type = RoomType::where('id', $request->id)->delete();

        return redirect()->route('admin.roomTypes.index');
    }
}
