<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Lecturer extends Authenticatable
{
    use HasFactory, HasRoles;

    public function Course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function Classroom()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
