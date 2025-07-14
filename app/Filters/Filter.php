<?php

namespace App\Filters;

class Filter
{
    public function apply($query, array $filters)
    {
        return $query
            ->when(!empty($filters['category_id']), function ($query) use ($filters) {
                return $query->where('category_id', $filters['category_id']);
            })->when(!empty($filters['subcategory_id']), function ($query) use ($filters) {
                return $query->where('subcategory_id', $filters['subcategory_id']);
            })->when(!empty($filters['district_id']), function ($query) use ($filters) {
                return $query->where('district_id', $filters['district_id']);
            })->when(!empty($filters['type_id']), function ($query) use ($filters) {
                return $query->where('type_id', $filters['type_id']);
            })->where('approval_status', 'approved')
            ->with(['category', 'subcategory', 'district', 'type'])
            ->latest()->paginate($filters['per_page'] ?? 10)->appends($filters);
    }

    public function filterByCategory($query, array $filters)
    {
        return $query
            ->when(!empty($filters['search']), function ($query) use ($filters) {
                return $query->where('name', 'like', '%' . $filters['search'] . '%');
            })
            ->when(!empty($filters['category_id']), function ($query) use ($filters) {
                return $query->where('category_id', $filters['category_id']);
            })
            ->with(['category'])
            ->latest()->paginate($filters['per_page'] ?? 10)->appends($filters);
    }
}
