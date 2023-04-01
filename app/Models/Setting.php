<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['sks_countdown'];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
}
