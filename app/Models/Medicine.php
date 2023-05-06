<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $table = 'medicines';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }
    
    public function scopeLocalsearch($query)
    {
        $query->when(request()->has('branch_id') && filled(request('branch_id')), function ($q) {
            $q->where('branch_id', request('branch_id'));
        });

        $query->when(request()->has('name') && filled(request('name')), function ($q) {
            $q->where('name', 'LIKE', '%' . request('name') . '%');
        });

        $query->when(request()->has('code') && filled(request('code')), function ($q) {
            $q->where('code', 'LIKE', '%' . request('code') . '%');
        });

        return $query;
    }
}
