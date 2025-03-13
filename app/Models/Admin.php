<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'about', // Add this
        'job', // Add this
        'country', // Add this
        'address', // Add this
        'phone', // Add this
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
