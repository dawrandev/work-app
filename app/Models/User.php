<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'phone',
        'password',
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
        'password' => 'hashed',
    ];


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function savedJobs()
    {
        return $this->belongsToMany(Job::class, 'save_jobs', 'user_id', 'job_id')
            ->withTimestamps();
    }

    public function appliedJobs()
    {
        return $this->belongsToMany(Job::class, 'job_applies', 'user_id', 'job_id')
            ->withPivot(['offer_id', 'cover_letter', 'status', 'applied_at'])
            ->withTimestamps();
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function appliedOffers()
    {
        return $this->belongsToMany(Offer::class, 'offer_applies')
            ->withPivot(['id', 'job_id', 'cover_letter', 'status', 'created_at', 'updated_at'])
            ->withTimestamps();
    }
}
