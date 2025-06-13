<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    protected $casts = [
        'name' => 'array'
    ];

    public function getTranslatedNameAttribute()
    {
        $locale = session('locale', 'kr');

        $name = is_array($this->name) ? $this->name : json_decode($this->name, true);

        return $this->name[$locale] ?? $this->name['kr'];
    }
}
