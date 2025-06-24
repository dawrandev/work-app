<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'json'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function getTranslatedNameAttribute()
    {
        $locale = session('locale', 'kr');

        return $this->name[$locale] ?? $this->name['kr'];
    }
}
