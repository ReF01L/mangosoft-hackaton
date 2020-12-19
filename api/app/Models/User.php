<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    protected $fillable = [
        'email',
        'phone',
        'first_name',
        'second_name',
        'name',
        'username',
        'company_name',
        'company_position',
        'company_description',
        'active',
        'password',

        'description',
    ];

    protected $hidden = [
        'password',
    ];

    const STUDENT = 'student';
    const TEACHER = 'teacher';
    const COMPANY = 'company';

    public function findForPassport($username)
    {
        return $this->where([
            'username' => $username,
            'active' => true,
        ])->first();
    }

    public function skills($role = self::TEACHER)
    {
        return $this->belongsToMany(Skill::class, 'skill_user', 'user_id', 'skill_id')
            ->wherePivotIn('role', [$role]);
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->second_name[0]}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
