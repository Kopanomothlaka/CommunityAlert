<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'location',
        'agenda',
        'description',
        'attendees',
        'status',
        ];
    protected $casts = [

        'start_time' => 'datetime', // Cast to DateTime
        'end_time' => 'datetime',   // Cast to DateTime
        'attendees' => 'array', // Cast JSON attendees to an array
    ];
}
