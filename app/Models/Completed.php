<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'submission_id', 'status'];

    public function Submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
