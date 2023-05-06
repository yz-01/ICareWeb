<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Room extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'room';

    protected $guarded = ['id'];

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('floor') && filled(request('floor')), function ($q) {
            $q->where('floor', 'LIKE', '%' . request('floor') . '%');
        });
        $query->when(request()->has('room_type_id') && filled(request('room_type_id')), function ($q) {
            $q->where('room_type_id', request('room_type_id'));
        });
        $query->when(request()->has('branch_id') && filled(request('branch_id')), function ($q) {
            $q->where('branch_id', request('branch_id'));
        });
        $query->when(request()->has('room_status') && filled(request('room_status')), function ($q) {
            $q->where('status', request('room_status'));
        });
        return $query;
    }
}
