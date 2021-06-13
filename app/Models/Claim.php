<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'coverage',
        'claimantName',
        'diagnosis',
        'hospitalizeDate',
        'hospitalizeDuration',
        'medcareName',
        'claimType',
        'dokumen',
        'subscription_id',
        'customer_id',
        'policy_id'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }
}
