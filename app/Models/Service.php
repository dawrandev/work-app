<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'category_id',
        'work_type',
        'destrict_id',
        'title',
        'description',
        'price',
        'address'
    ];
}
