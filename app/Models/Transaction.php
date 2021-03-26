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
    ];

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
    public function customer()
    {
        return $this->hasOne(User::class);
    }
}
