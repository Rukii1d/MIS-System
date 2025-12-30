<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redahrm extends Model
{
    protected $table = 'redahrm';

    protected $fillable = [
        'task',
        'due_date',
        'complete_date',
        'status',
        'progress',
        'file_path'
    ];
}
