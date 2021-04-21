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
        'policy_name',
        'gender',
        'fullName',
        'birthdate',
        'phone',
        'address',
        'policy_id',
        'customer_id'
    ];
    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }
    public function policy()
    {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }
}
