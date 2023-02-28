<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NatureBusiness extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function center_users()
    {
        return $this->hasMany(CenterUser::class);
    }

    public function company_users()
    {
        return $this->hasMany(CompanyUser::class);
    }
}
