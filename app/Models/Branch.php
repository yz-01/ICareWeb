<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branch extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'branch';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token, 'branch'));
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('name') && filled(request('name')), function ($q) {
            $q->where('name', 'LIKE', '%' . request('name') . '%');
        });
        $query->when(request()->has('city_id') && filled(request('city_id')), function ($q) {
            $q->where('city_id', request('city_id'));
        });
        $query->when(request()->has('state_id') && filled(request('state_id')), function ($q) {
            $q->where('state_id', request('state_id'));
        });
        $query->when(request()->has('country_id') && filled(request('country_id')), function ($q) {
            $q->where('country_id', request('country_id'));
        });
        $query->when(request()->has('branch_status') && filled(request('branch_status')), function ($q) {
            $q->where('status', request('branch_status'));
        });
        return $query;
    }
}
