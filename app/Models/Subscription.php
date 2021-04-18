<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'startDate',
        'endDate',
        'status',
        'maxCoverage',
        'premium',
        'gender',
        'fullName',
        'birthdate',
        'phone',
        'address',
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
