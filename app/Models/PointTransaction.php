<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function center_user()
    {
        return $this->belongsTo(CenterUser::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function company_user()
    {
        return $this->belongsTo(CompanyUser::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
