<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ];

    public function orders() {
    return $this->belongsToMany(Order::class, 'order_menus')->withPivot('quantity', 'note');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
