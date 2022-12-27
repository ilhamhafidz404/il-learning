<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    public function Course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function Classroom()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
