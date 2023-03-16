<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'mentor', 'program_id'];

    public function Student()
    {
        return $this->hasMany(Student::class);
    }

    public function Submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function Lecturer()
    {
        return $this->belongsToMany(Lecturer::class);
    }

    public function Program()
    {
        return $this->belongsTo(Program::class);
    }
}
