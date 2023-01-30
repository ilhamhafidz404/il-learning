<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'deadline',
        'mission_id',
        'lecturer_id',
        'course_id',
        'classroom_id',
        'theory'
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function Lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function Mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function Submitsubmission()
    {
        return $this->hasMany(Submitsubmission::class);
    }
}
