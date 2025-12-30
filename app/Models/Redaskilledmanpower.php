<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redaskilledmanpower extends Model
{
    use HasFactory;

    protected $table = 'redaskilledmanpower';

    protected $fillable = [
        'task',
        'due_date',
        'complete_date',
        'status',
        'progress',
        'file_path',
    ];

    protected $casts = [
        'due_date' => 'date',
        'complete_date' => 'date',
    ];
}

