<?php

namespace App\Services;

use App\Http\Requests\OrderStoreRequest;
use App\Repositories\OrderImageRepository;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderImageRepository $orderImageRepository
    ) {
        // 
    }

    public function createOrder(array $data, $request)
    {
        try {
            DB::transaction(function () use ($data, $request) {
                $data['user_id'] = auth()->id();
                $order = $this->orderRepository->create($data);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filenime = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs("orders", $filenime, 'public');

                        $orderImage = $this->orderImageRepository->create([
                            'order_id' => $order->id,
                            'image_path' => $path,
                        ]);
                    }
                }

                return $order;
            });
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getFilteredOrders(array $filters)
    {
        return $this->orderRepository->filter($filters);
    }

    public function getOrder($id)
    {
        return $this->orderRepository->getOrder($id);
    }

    public function getUserOrders($order_id)
    {
        return $this->orderRepository->getUserOrders($order_id);
    }
}
