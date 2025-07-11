<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    protected $casts =
    [
        'name' => 'array'
    ];

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
