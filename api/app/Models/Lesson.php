<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'price',

        'cell_id',
        'student_id',
        'teacher_id',

        'payment_id',
        'expired_at',
        'paid',
    ];

    public function cell()
    {
        return $this->belongsTo(Cell::class, 'cell_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function scopeWaiting($query)
    {
        return $query->where('payment_id', '!=', null)
            ->where('paid', '=', false)
            ->where('expired_at', '>=', date('Y-m-d H:i'));
    }

    public function scopeExpired($query)
    {
        return $query
            ->where('expired_at', '<', date('Y-m-d H:i'));
    }
}
