<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CourseDataTable;
use App\Facade\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseDataTable $dataTable)
    {
        return $dataTable->render('admin.courses.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.courses.create',compact('trainers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'desc' => 'required|max:500',
            'claimable' => 'required',
            'datetime' => 'required',
            'duration' => 'required|integer',
            'venue' => 'required',

        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->desc,
            'hrdf_claimable' => $request->hrdf_claimable,
            'datetime' => $request->datetime,
            'duration' => $request->duration,
            'venue' => $request->venue,
            'trainer_id' => $request->trainer,
        ]);

        $request->session()->flash('success', 'Created Successfully');

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $trainers = Trainer::all();

        return view('admin.courses.edit',compact('course','trainers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'desc' => 'required|max:500',
            'claimable' => 'required',
            'datetime' => 'required',
            'duration' => 'required|integer',
            'venue' => 'required',

        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->desc,
            'hrdf_claimable' => $request->hrdf_claimable,
            'datetime' => $request->datetime,
            'duration' => $request->duration,
            'venue' => $request->venue,
            'trainer_id' => $request->trainer,
        ]);

        $request->session()->flash('success', 'Updated Successfully');

        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course Deleted Successfully');
    }
}
