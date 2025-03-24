<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'min_salary',
        'max_salary',
        'job_type',
        'category',
        'deadline',
        'description',
        'status',
    ];
}
