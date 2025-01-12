<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'platform',
        'link',
        'capacity',
        'status',
    ];

    // Casting 'date' into Carbon instance
    protected $casts = [
        'date' => 'datetime',
    ];
}
