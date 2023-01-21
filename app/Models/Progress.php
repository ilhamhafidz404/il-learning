<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = ['progress', 'user_id', 'mission_id', 'submission_count'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
