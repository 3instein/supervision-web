<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'namer',
        'description',
        'minimal',
        'discount',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }
}
