<?php

namespace App\Models;

use HasViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    use HasViews;

    protected $fillable =
    [
        'user_id',
        'category_id',
        'subcategory_id',
        'district_id',
        'type_id',
        'employment_type_id',
        'phone',
        'title',
        'description',
        'salary_from',
        'salary_to',
        'deadline',
        'address',
        'longitude',
        'latitude',
        'status',
        'approval_status',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function employment_type()
    {
        return $this->belongsTo(EmploymentType::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'save_jobs', 'job_id', 'user_id')
            ->withTimestamps();
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'job_applies', 'job_id', 'user_id')
            ->withPivot(['offer_id', 'cover_letter', 'status'])
            ->withTimestamps();
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
