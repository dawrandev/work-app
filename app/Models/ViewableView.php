<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewableView extends Model
{
    use HasFactory;

    protected $fillable = [
        'viewable_id',
        'viewable_type',
        'viewed_at',
        'ip_address',
        'user_id'
    ];

    protected $casts = [
        'viewed_at' => 'datetime'
    ];

    public function viewable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
