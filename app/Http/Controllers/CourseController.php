<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Customer;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $trainerCourses = Course::where('trainer_id',$course->trainer_id)->paginate(4);
        return view('course',compact('course','trainerCourses'));
    }

    public function courselist()
    {
        $courses = Course::paginate(9);
        $allcourses = Course::all();
        $trainers = Trainer::all();
        $trainer = '';
        $status = 1;
        return view('course-list',compact('courses','trainers','allcourses','status','trainer'));
    }
    public function courselistTrainer($trainer_id)
    {
        $courses = Course::where('trainer_id',$trainer_id)->paginate(9);
        $allcourses = Course::where('trainer_id',$trainer_id)->get();
        $trainers = Trainer::all();
        $status = 2;
        return view('course-list',compact('courses','trainers','allcourses','status','trainer_id'));
    }
}
