<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{

    protected $fillable = [
        'user_id',
        'amount',
        'currency',
        'gateway',
        'status',
        'payment_method',
        'transaction_id',
        'description',
        'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}