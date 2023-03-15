<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Course extends Component
{
    public $trainers,$showVenue=false,$showExisting=True,$desc,$course;

    public function mount($trainers,$course=[]){
        $this->trainers = $trainers;
        $this->course = $course;
        if ($course != []){
            if ($course->online == 1){
                $this->showVenue = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.course');
    }

    public function openVenue()
    {
        $this->showVenue =! $this->showVenue;
    }

    public function changeExisting(){
        $this->showExisting =! $this->showExisting;

    }
}
