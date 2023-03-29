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
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;

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
                    'desc' => 'required|max:5500',
                    'claimable' => 'required',
                    'start' => 'required',
                    'end' => 'required',
                    'duration' => 'required|integer',
                    'online' => 'required',
                    'existing' => 'required',
                    'approved' => 'required',
                    'price' => 'required',
                    'banner' => 'nullable|max:8192',
                    'image' => 'nullable|max:8192',
                ]);

            if ($request->online == 0){ //offline, venue required
                $this->validate($request, [
                    'venue' => 'required',
                ]);
            }

            if ($request->existing == 0) { //Existing Trainer
                $this->validate($request, [
                    'trainer' => 'nullable',
                ]);
            }else{
                $this->validate($request, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:trainers',
                    'qualification' => 'nullable',
                    'experience' => 'nullable',
                    'photo' => 'nullable|max:8192',
                ]);
            }

            if ($request->banner){
                $file_name = $request->title;  // File name using user id;
                $image = $request->file('banner');
                $fileName = $file_name . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->stream();
                Storage::disk('public')->put("/course/banner/" . $fileName, $img);
                $banner_file = "storage/course/banner/" . $fileName;   // Get path to access image
            }
            if ($request->image){
                $file_name = $request->title;  // File name using user id;
                $image = $request->file('image');
                $fileName = $file_name . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->stream();
                Storage::disk('public')->put("/course/image/" . $fileName, $img);
                $img_file = "storage/course/image/" . $fileName;   // Get path to access image
            }

            $last_trainer = Trainer::withTrashed()->latest('id')->first();
            if ($request->photo){
                $file_name = $last_trainer ? $last_trainer->id + 1 : 1;  // File name using user id;
                $image = $request->file('photo');
                $fileName = $file_name . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->stream();
                Storage::disk('public')->put("/trainer/avatars/" . $fileName, $img);
                $avatar_file = "storage/trainer/avatars/" . $fileName;   // Get path to access image
            }

            $course = Course::create([
                'title' => $request->title,
                'description' => $request->desc,
                'hrdf_claimable' => $request->claimable,
                'start' => $request->start,
                'end' => $request->end,
                'duration' => $request->duration,
                'venue' => $request->venue,
                'online' => $request->online,
                'is_approved' => $request->approved,
                'price' => $request->price,
                'banner' => $banner_file??'',
                'image' => $img_file??'',
//            'trainer_id' => $request->trainer,
            ]);


            if ($request->existing == 0) { //Existing Trainer
                $course->update([
                    'trainer_id' => $request->trainer,
                ]);
            }else{
                $trainer = Trainer::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar' => $avatar_file??'',
                    'experience' =>  $request->experience,
                    'qualification' =>  $request->qualification,
                ]);

                $course->update([
                    'trainer_id' => $trainer->id,
            ]);
        }

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
            'desc' => 'required|max:5500',
            'claimable' => 'required',
            'start' => 'required',
            'end' => 'required',
            'duration' => 'required|integer',
            'online' => 'required',
            'existing' => 'required',
            'approved' => 'required',
            'price' => 'required',
            'banner' => 'nullable|max:8192',
            'image' => 'nullable|max:8192',
            'trainer' => 'required',

        ]);

        if ($request->online == 0){ //offline, venue required
            $this->validate($request, [
                'venue' => 'required',
            ]);
        }


        if ($request->banner){
            $file_name = $request->title;  // File name using user id;
            $image = $request->file('banner');
            $fileName = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream();
            Storage::disk('public')->put("/course/banner/" . $fileName, $img);
            $banner_file = "storage/course/banner/" . $fileName;   // Get path to access image
        }
        if ($request->image){
            $file_name = $request->title;  // File name using user id;
            $image = $request->file('image');
            $fileName = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream();
            Storage::disk('public')->put("/course/image/" . $fileName, $img);
            $img_file = "storage/course/image/" . $fileName;   // Get path to access image
        }


        $course->update([
            'title' => $request->title,
            'description' => $request->desc,
            'hrdf_claimable' => $request->claimable,
            'start' => $request->start,
            'end' => $request->end,
            'duration' => $request->duration,
            'venue' => $request->venue,
            'online' => $request->online,
            'is_approved' => $request->approved,
            'price' => $request->price,
            'banner' => $banner_file??'',
            'image' => $img_file??'',
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
