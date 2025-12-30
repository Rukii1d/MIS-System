<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // important for auth features
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'picture',
        'type',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
