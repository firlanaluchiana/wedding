<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wedding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'groom_name',
        'bride_name',
        'groom_bio',
        'bride_bio',
        'groom_image',
        'bride_image',
        'wedding_date',
        'venue',
        'city',
        'slug'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
