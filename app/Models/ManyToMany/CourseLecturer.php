<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLecturer extends Model
{
    use HasFactory;

    protected $table = 'course_lecturer';
    protected $fillable = ['course_id', 'lecturer_id'];
}
