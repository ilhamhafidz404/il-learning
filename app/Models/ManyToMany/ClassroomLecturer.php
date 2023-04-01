<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomLecturer extends Model
{
    use HasFactory;
    protected $table = 'classroom_lecturer';
    protected $fillable = ['classroom_id', 'lecturer_id'];
    public $timestamps = false;
}
