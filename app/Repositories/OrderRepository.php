<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function create(array $data)
    {
        return Order::create($data);
    }

    public function filter(array $filters)
    {
        return Order::when(!empty($filters['category_id']), function ($query) use ($filters) {
            $query->where('category_id', $filters['category_id']);
        })
            ->when(!empty($filters['district_id']), function ($query) use ($filters) {
                $query->where('district_id', $filters['district_id']);
            })
            ->when(!empty($filters['type_id']), function ($query) use ($filters) {
                $query->where('type_id', $filters['type_id']);
            })
            ->latest()
            ->paginate(10)
            ->appends($filters);
    }
}
