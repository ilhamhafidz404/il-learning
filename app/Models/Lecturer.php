<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Lecturer extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = ['user_id', 'profile', 'nip', 'gender'];

    public function Course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function Classroom()
    {
        return $this->belongsToMany(Classroom::class);
    }

    public function Submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
