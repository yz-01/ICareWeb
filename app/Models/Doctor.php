<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'doctor';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token, 'doctor'));
    }

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }


    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('code') && filled(request('code')), function ($q) {
            $q->where('code', 'LIKE', '%' . request('code') . '%');
        });
        $query->when(request()->has('name') && filled(request('name')), function ($q) {
            $q->where('name', 'LIKE', '%' . request('name') . '%');
        });
        $query->when(request()->has('email') && filled(request('email')), function ($q) {
            $q->where('email', 'LIKE', '%' . request('email') . '%');
        });
        $query->when(request()->has('identity_card') && filled(request('identity_card')), function ($q) {
            $q->where('identity_card', 'LIKE', '%' . request('identity_card') . '%');
        });
        $query->when(request()->has('doctor_status') && filled(request('doctor_status')), function ($q) {
            $q->where('status', request('doctor_status'));
        });
        $query->when(request()->has('branch_id') && filled(request('branch_id')), function ($q) {
            $q->where('branch_id', request('branch_id'));
        });
        $query->when(request()->has('area_of_experise') && filled(request('area_of_experise')), function ($q) {
            $q->where('area_of_experise', 'LIKE', '%' . request('area_of_experise') . '%');
        });
        return $query;
    }
}
