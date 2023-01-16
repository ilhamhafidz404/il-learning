<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    public function Submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
