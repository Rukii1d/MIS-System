<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redaitcenter extends Model
{
    protected $table = 'redaitcenters';

    protected $fillable = [
        'task',
        'due_date',
        'complete_date',
        'status',
        'progress',
        'file_path',
    ];

    // Add this cast so due_date and complete_date are Carbon instances automatically
    protected $casts = [
        'due_date' => 'datetime',
        'complete_date' => 'datetime',
    ];
}
