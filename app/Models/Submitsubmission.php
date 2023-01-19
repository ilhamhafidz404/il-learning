<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submitsubmission extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'file', 'user_id', 'mission_id', 'submission_id', 'extension'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
