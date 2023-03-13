<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function scopeLocalSearch($query)
    {
        $query->when(request()->has('title') && filled(request('title')), function ($q) {
            $q->where('title', 'LIKE', '%' . request('title') . '%');
        });
        $query->when(request()->has('datetime') && filled(request('datetime')), function ($q) {
            $q->where('datetime', 'LIKE', '%' . request('datetime') . '%');
        });
        $query->when(request()->has('duration') && filled(request('duration')), function ($q) {
            $q->where('duration', 'LIKE', '%' . request('duration') . '%');
        });
        $query->when(request()->has('venue') && filled(request('venue')), function ($q) {
            $q->where('venue', 'LIKE', '%' . request('venue') . '%');
        });
        $query->when(request()->has('claimable') && filled(request('claimable')), function ($q) {
            $q->where('hrdf_claimable', request('claimable'));
        });
        return $query;
    }
}
