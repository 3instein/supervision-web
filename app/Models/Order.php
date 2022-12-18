<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }

    public function menus() {
        return $this->belongsToMany(Menu::class, 'order_menus');
    }
}
