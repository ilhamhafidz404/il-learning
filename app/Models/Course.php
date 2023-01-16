<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function Lecturer()
    {
        return $this->belongsToMany(Lecturer::class);
    }

    public function User()
    {
        return $this->belongsToMany(User::class);
    }

    public function Submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function Mission()
    {
        return $this->hasMany(Mission::class);
    }
}
