<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redasalary extends Model
{
    protected $table = 'redasalaries';

    protected $fillable = [
        'task',
        'due_date',
        'complete_date',
        'status',
        'progress',
        'file_path',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'complete_date' => 'datetime',
    ];
}
