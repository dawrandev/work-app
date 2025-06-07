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
            return $query->where('category_id', $filters['category_id']);
        })
            ->when(!empty($filters['district_id']), function ($query) use ($filters) {
                return $query->where('district_id', $filters['district_id']);
            })
            ->when(!empty($filters['type_id']), function ($query) use ($filters) {
                return $query->where('type_id', $filters['type_id']);
            })
            ->latest()
            ->paginate(10)
            ->appends($filters);
    }

    public function getOrder($id)
    {
        return Order::where('id', $id)->get();
    }

    public function getUserOrders($order_id)
    {
        return Order::where('user_id', auth()->id())
            ->where('id', '$order_id')
            ->latest()
            ->paginate(5)
            ->appends(['user_id' => auth()->id()]);
    }
}
