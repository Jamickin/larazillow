<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'area', 'baths', 'beds', 'code', 'price', 'street', 'street_nr'
    ];

    public function owner(): BelongsTo 
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }
}
