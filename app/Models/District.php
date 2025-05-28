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

    public function getTranslatedNameAttribute()
    {
        $locale = session('locale', 'kr');

        return $this->name[$locale] ?? $this->name['kr'];
    }
}
