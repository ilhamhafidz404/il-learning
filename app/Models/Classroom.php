<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function Lecturer()
    {
        return $this->belongsToMany(Lecturer::class);
    }
}
