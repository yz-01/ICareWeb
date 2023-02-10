<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
