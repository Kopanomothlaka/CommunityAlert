<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'alert_name',
        'location',
        'start_datetime',
        'end_datetime',
        'status',
    ];
}
