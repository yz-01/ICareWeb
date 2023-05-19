<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientCall extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $table = 'patient_calls';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
}
