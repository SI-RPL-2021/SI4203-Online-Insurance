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
        'amount'
    ];
    public function customer()
    {
        return $this->hasOne(User::class);
    }
}
