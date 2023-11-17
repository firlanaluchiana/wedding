<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $fillable = [
        'groom_name',
        'bride_name',
        'groom_bio',
        'bride_bio',
        'groom_image',
        'bride_image',
        'wedding_date',
        'venue',
        'city'
    ];
}
