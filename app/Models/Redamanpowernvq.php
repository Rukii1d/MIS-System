<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redamanpowernvq extends Model
{
    protected $table = 'redamanpowernvq';

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

    public $timestamps = false;
}
