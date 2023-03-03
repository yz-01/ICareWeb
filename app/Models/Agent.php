<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'agent';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token, 'agent'));
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault([
            'name' => '-',
        ]);
    }

    public function security_question()
    {
        return $this->belongsTo(SecurityQuestion::class)->withDefault([
            'name' => '-',
        ]);
    }

    public function point_transactions()
    {
        return $this->hasMany(PointTransaction::class);
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
        $query->when(request()->has('agent_status') && filled(request('agent_status')), function ($q) {
            $q->where('status', request('agent_status'));
        });
        return $query;
    }
}
