<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile',
        'nim',
        'classroom_id',
        'phone',
        'about',
        'gender',
        'birthday',
        'address',
        'facebook',
        'youtube',
        'tiktok',
        'github',
        'instagram',
        'twitter'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
