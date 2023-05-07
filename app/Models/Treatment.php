<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $table = 'treatments';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'pic_doctor_id');
    }

    public function nurse()
    {
        return $this->belongsTo(\App\Models\Nurse::class, 'pic_nurse_id');
    }

    public function ward()
    {
        return $this->belongsTo(\App\Models\Ward::class);
    }

    public function treatment_medicine()
    {
        return $this->hasMany(TreatmentMedicine::class, 'treatment_id');
    }

    public function support_doctor()
    {
        return $this->hasMany(SupportDoctor::class, 'support_doctor_id');
    }

    public function support_nurse()
    {
        return $this->hasMany(SupportNurse::class, 'support_nurse_id');
    }
    
    public function scopeLocalsearch($query)
    {
        $query->when(request()->has('patient_id') && filled(request('patient_id')), function ($q) {
            $q->where('patient_id', request('patient_id'));
        });

        $query->when(request()->has('doctor_id') && filled(request('doctor_id')), function ($q) {
            $treatment = SupportDoctor::where('support_doctor_id', request('doctor_id'))->pluck('treatment_id');
            $q->orWhere('pic_doctor_id', request('doctor_id'))->orWhereIn('id', $treatment);
        });

        $query->when(request()->has('nurse_id') && filled(request('nurse_id')), function ($q) {
            $treatment = SupportNurse::where('support_nurse_id', request('nurse_id'))->pluck('treatment_id');
            $q->orWhere('pic_nurse_id', request('nurse_id'))->orWhereIn('id', $treatment);
        });

        $query->when(request()->has('title') && filled(request('title')), function ($q) {
            $q->where('title', 'LIKE', '%' . request('title') . '%');
        });

        return $query;
    }
}
