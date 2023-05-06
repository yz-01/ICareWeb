<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ward extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'ward';

    protected $guarded = ['id'];

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }

    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('ward_number') && filled(request('ward_number')), function ($q) {
            $q->where('ward_number', 'LIKE', '%' . request('ward_number') . '%');
        });
        $query->when(request()->has('room_id') && filled(request('room_id')), function ($q) {
            $q->where('room_id', request('room_id'));
        });
        $query->when(request()->has('branch_id') && filled(request('branch_id')), function ($q) {
            $q->where('branch_id', request('branch_id'));
        });
        $query->when(request()->has('ward_status') && filled(request('ward_status')), function ($q) {
            $q->where('status', request('ward_status'));
        });
        return $query;
    }
}
