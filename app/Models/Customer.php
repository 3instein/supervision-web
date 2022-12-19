<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Customer extends Model implements Authenticatable
{


    use AuthenticableTrait;

    protected $fillable = [
        'email',
        'password',
        'points',
    ];

    protected $hidden = [
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
