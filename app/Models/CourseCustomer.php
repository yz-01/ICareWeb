<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CourseCustomer extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}