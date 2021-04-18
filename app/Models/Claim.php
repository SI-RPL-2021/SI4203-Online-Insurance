<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'note',
        'coverage',
        'claimantName',
        'diagnosis',
        'hospitalizeDate',
        'hospitalizeduration',
        'medcareName',
        'claimType'
    ];
    public function customer()
    {
        return $this->hasOne(User::class);
    }
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
    public function policy()
    {
        return $this->hasOne(Policy::class);
    }
}
