<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'amount',
        'customerName',
        'paymentDate',
        'paymentMethod',
        'customer_id',
        'policy_id',
        'subscription_id'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
