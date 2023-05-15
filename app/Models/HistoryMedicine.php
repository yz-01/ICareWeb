<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryMedicine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $table = 'history_medicines';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function medicine()
    {
        return $this->belongsTo(\App\Models\Medicine::class);
    }
}
