<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subtitle', 'deadline', 'lecturer_id', 'course_id', 'classroom_id'];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
