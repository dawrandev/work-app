<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'category_id',
        'subcategory_id',
        'district_id',
        'type_id',
        'title',
        'description',
        'salary_from',
        'salary_to',
        'deadline',
        'address',
        'status',
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

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'save_jobs', 'job_id', 'user_id')
            ->withTimestamps();
    }
}
