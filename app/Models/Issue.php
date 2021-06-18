<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $fillable = [
        "title", "comment", "user_id", "respons"

        // TODO: Add field

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
