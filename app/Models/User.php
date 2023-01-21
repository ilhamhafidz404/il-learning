<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'classroom_id',
        'mode'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function Submitsubmission()
    {
        return $this->hasMany(Submitsubmission::class);
    }

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    public function Lecturer()
    {
        return $this->hasMany(Lecturer::class);
    }

    public function Progress()
    {
        return $this->hasMany(Progress::class);
    }
}
