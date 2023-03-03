<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CenterUser extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'center_user';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token, 'center_user'));
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

    public function promote_product()
    {
        return $this->belongsTo(PromoteProduct::class);
    }

    public function nature_business()
    {
        return $this->belongsTo(NatureBusiness::class);
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
        $query->when(request()->has('company_name') && filled(request('company_name')), function ($q) {
            $q->where('company_name', 'LIKE', '%' . request('company_name') . '%');
        });
        $query->when(request()->has('center_user_status') && filled(request('center_user_status')), function ($q) {
            $q->where('status', request('center_user_status'));
        });
        return $query;
    }
}
