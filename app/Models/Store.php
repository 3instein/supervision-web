<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
