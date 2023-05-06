<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RoomType extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'room_type';

    protected $guarded = ['id'];

    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('name') && filled(request('name')), function ($q) {
            $q->where('name', 'LIKE', '%' . request('name') . '%');
        });
        $query->when(request()->has('roomType_status') && filled(request('roomType_status')), function ($q) {
            $q->where('status', request('roomType_status'));
        });
        return $query;
    }
}
