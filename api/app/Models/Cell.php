<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'start',
        'end',
        'price',
        'mode',
    ];

    const FREE = 'free';
    const BLOCKED = 'blocked';
    const ACTIVE = 'active';
}
