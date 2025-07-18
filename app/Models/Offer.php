<?php

namespace App\Models;

use HasViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    use HasViews;

    protected $fillable = [
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
        'address',
        'status',
        'approval_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function employmentType()
    {
        return $this->belongsTo(EmploymentType::class);
    }

    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'offer_applies', 'offer_id', 'user_id')
            ->withPivot(['job_id', 'cover_letter', 'status'])
            ->withTimestamps();
    }
}
