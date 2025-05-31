<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'category_id',
        'destrict_id',
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

    public function order_images()
    {
        return $this->hasMany(OrderImage::class);
    }
}
