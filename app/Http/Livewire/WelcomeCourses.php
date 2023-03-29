<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\Course;
use Livewire\Component;
use Livewire\WithPagination;

class WelcomeCourses extends Component
{
    use WithPagination;

    public  $allcourses, $courses, $courseList,$showmore;
    protected $listeners = ['loadMoreData2'];

    public function mount($allcourses,$courses){
        $this->allcourses = $allcourses;
        $this->courses = $courses->items();
//        $this->courseList = $this->courses;
        $this->showmore = false;
    }

    public function render()
    {
        return view('livewire.welcome-courses');
    }

    public function exploreChange(){
       $this->showmore = true;
    }
}
