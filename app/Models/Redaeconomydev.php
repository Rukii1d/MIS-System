<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redaeconomydev extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'due_date',
        'complete_date',
        'status',
        'progress',
        'file_path',
    ];
}
