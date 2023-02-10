<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'merchant';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault([
            'name' => '-',
        ]);
    }

    public function promote_product()
    {
        return $this->belongsTo(PromoteProduct::class);
    }
}
