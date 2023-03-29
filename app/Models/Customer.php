<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'customer';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token, 'customer'));
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

    public function courseCustomer()
    {
        return $this->hasOne(courseCustomer::class);
    }

    public function point_transactions()
    {
        return $this->hasMany(PointTransaction::class);
    }

    public function company_user()
    {
        return $this->belongsTo(CompanyUser::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function paymentItem()
    {
        return $this->hasOne(PaymentItem::class);
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
        $query->when(request()->has('customer_status') && filled(request('customer_status')), function ($q) {
            $q->where('status', request('customer_status'));
        });
        return $query;
    }
}
