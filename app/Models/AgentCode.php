<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function company_details()
    {
        return $this->hasMany(CompanyDetail::class);
    }
}
