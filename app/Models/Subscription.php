<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'customer',
        'status'
    ];
    public function customer()
    {
        return $this->hasOne(User::class);
    }
    public function policy()
    {
        return $this->hasOne(Policy::class);
    }
}
