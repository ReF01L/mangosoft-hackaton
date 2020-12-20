<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'read',
        'type',
    ];

    const PAYMENT = 'payment';
    const MARK_TEACHER = 'mark_teacher';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
