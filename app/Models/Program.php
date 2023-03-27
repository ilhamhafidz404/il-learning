<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'level', 'code', 'faculty_id'];

    public function Classroom()
    {
        return $this->hasMany(Classroom::class);
    }

    public function Faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
