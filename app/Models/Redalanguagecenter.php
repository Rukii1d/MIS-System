<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redalanguagecenter extends Model
{
    protected $fillable = [
        'task',
        'due_date',
        'complete_date',
        'status',
        'progress',
        'file_path',
    ];

    // Optional: cast date columns
    protected $dates = ['due_date', 'complete_date'];
}
