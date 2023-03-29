<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class CourseList extends Component
{
    use WithPagination;
    public $allcourses,$trainers,$searchCourse='',$searchTrainer,$searchShort,$status,$trainer_id;

    public function mount( $allcourses, $trainers,$status,$trainer_id){
        $this->allcourses = $allcourses;
        $this->trainers = $trainers;
        $this->trainer_id = $trainer_id;
        $this->status = $status;
    }

    public function render()
    {
        $searchCourseTerm = '%'.$this->searchCourse.'%';
        $coursesquery = Course::query();

        if ($this->searchTrainer != null && $this->searchTrainer != '0'){
            $searchTrainerTerm  = $this->searchTrainer;
            $coursesquery->where('trainer_id',$this->searchTrainer);
        }

        if ($this->searchShort != null ){
            if ($this->searchShort == '1'){
                $coursesquery->orderBy('price','asc');
            }elseif($this->searchShort =='2'){
                $coursesquery->orderBy('price','DESC');
            }
        }

        if ($this->status == 2){ //search with trainer
            $this->searchTrainer = $this->trainer_id;
            $coursesquery->where('trainer_id',$this->trainer_id);
        }

        $coursesquery->where('title','LIKE',$searchCourseTerm);
        $courses = $coursesquery->paginate(9);
        return view('livewire.course-list',compact('courses'));
    }

    public function trainerChange(){

    }

    public function shortChange(){
    }
}
