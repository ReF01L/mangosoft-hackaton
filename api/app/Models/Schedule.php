<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
    ];

    public function cells()
    {
        return $this->hasMany(Cell::class, 'schedule_id', 'id');
    }
}
