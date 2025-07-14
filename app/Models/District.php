<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $casts =
    [
        'name' => 'array'
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function getTranslatedNameAttribute()
    {
        $locale = session('locale', 'kr');

        if (is_string($this->name)) {
            $names = json_decode($this->name, true);
        } else {
            $names = $this->name;
        }

        return $names[$locale] ?? $names['kr'] ?? 'No translation';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = is_array($value)
            ? json_encode($value, JSON_UNESCAPED_UNICODE)
            : $value;
    }
}
