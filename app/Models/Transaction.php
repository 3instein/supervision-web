<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $fillable = [
        'order_id',
        'voucher_id',
        'confirmed_by',
        'total',
        'payment_method',
        'status',
    ];

    public function order() {
        return $this->belongsTo(Order::class)->withTrashed();
    }

    public function voucher() {
        return $this->belongsTo(Voucher::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'confirmed_by');
    }
}
