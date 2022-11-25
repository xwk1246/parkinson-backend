<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

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
        'gender',
        'birthday',
        'personal_id',
        'phone',
        'doctor_id'
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

    public function isDoctor()
    {
        if ($this->hasRole('doctor'))
            return true;
        return false;
    }

    public function isPatient()
    {
        if ($this->hasRole('patient'))
            return true;
        return false;
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, "id", "doctor_id");
    }

    public function patients()
    {
        return $this->hasMany(User::class, "doctor_id", "id");
    }
    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
    public function records()
    {
        return $this->hasMany(Record::class);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
