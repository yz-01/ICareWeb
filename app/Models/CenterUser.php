<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CenterUser extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guard = 'center_user';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token, 'center_user'));
    }

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

    public function nature_business()
    {
        return $this->belongsTo(NatureBusiness::class);
    }

    public function point_transactions()
    {
        return $this->hasMany(PointTransaction::class);
    }
}
