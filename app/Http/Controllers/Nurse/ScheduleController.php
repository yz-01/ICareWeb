<?php

namespace App\Http\Controllers\Nurse;

use App\DataTables\Nurse\ScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Schedule;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function index(ScheduleDataTable $dataTable)
    {
        $doctor = Doctor::all();

        $nurse = Nurse::all();

        return $dataTable->render('nurse.schedules.index', compact('doctor', 'nurse'));
    }

    public function create()
    {
        $doctor = Doctor::all();

        $nurse = Nurse::all();

        return view('nurse.schedules.create', compact('doctor', 'nurse'));
    }

    public function store(Request $request)
    {
        $schedule = Schedule::create([
            'date' => $request->date,
            'shift' => $request->shift,
        ]);

        if($request->doctor_id)
        {
            $schedule->update([
                'doctor_id' => $request->doctor_id,
            ]);
        }

        if($request->nurse_id)
        {
            $schedule->update([
                'nurse_id' => $request->nurse_id,
            ]);
        }

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('nurse.schedules.index');
    }

    public function show(Room $room)
    {
        $branch = Branch::all();

        $room_type = RoomType::all();

        return view('nurse.schedules.show', compact('branch', 'room_type', 'room'));
    }

    public function edit(Schedule $schedule)
    {
        $doctor = Doctor::all();

        $nurse = Nurse::all();

        return view('nurse.schedules.edit', compact('schedule', 'doctor', 'nurse'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update([
            'date' => $request->date,
            'shift' => $request->shift,
        ]);

        $request->session()->flash('success', trans('Update Successfully'));

        return redirect()->route('nurse.schedules.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('nurse.schedules.index')->with('success', 'Schedule Deleted Successfully');
    }
}
