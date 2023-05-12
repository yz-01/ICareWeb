<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $table = 'announcements';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function admin()
    {
        return $this->belongsTo(\App\Models\Admin::class);
    }

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }
    
    public function scopeLocalsearch($query)
    {
        $query->when(request()->has('published_to') && filled(request('published_to')), function ($q) {
            $q->where('published_to', request('published_to'));
        });

        $query->when(request()->has('title') && filled(request('title')), function ($q) {
            $q->where('title', 'LIKE', '%' . request('title') . '%');
        });

        $query->when(request()->has('published_at') && filled(request('published_at')), function ($q) {
            $q->where('published_at', 'LIKE', '%' . request('published_at') . '%');
        });

        return $query;
    }
}
