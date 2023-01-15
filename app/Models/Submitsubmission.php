<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submitsubmission extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'file', 'user_id', 'submission_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
