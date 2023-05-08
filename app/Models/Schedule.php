<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Schedule extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'room';

    protected $guarded = ['id'];

    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class);
    }

    public function nurse()
    {
        return $this->belongsTo(\App\Models\Nurse::class);
    }

    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('date') && filled(request('date')), function ($q) {
            $q->where('date', request('date'));
        });
        $query->when(request()->has('doctor_id') && filled(request('doctor_id')), function ($q) {
            $q->where('doctor_id', request('doctor_id'));
        });
        $query->when(request()->has('nurse_id') && filled(request('nurse_id')), function ($q) {
            $q->where('nurse_id', request('nurse_id'));
        });
        return $query;
    }
}
