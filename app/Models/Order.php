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
        'work_type',
        'title',
        'description',
        'price',
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
