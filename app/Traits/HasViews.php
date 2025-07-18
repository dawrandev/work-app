<?php

namespace App\Traits;

use App\Models\ViewableView;


trait HasViews
{
    public function views()
    {
        return $this->morphMany(ViewableView::class, 'viewable');
    }

    public function getViewsCountAttribute()
    {
        return $this->views()->count();
    }

    public function getUniqueViewsCountAttribute()
    {
        return $this->views()->distinct('ip_address')->count();
    }
}
