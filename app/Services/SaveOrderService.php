<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SaveOrderService
{
    public function saveOrder(array $data)
    {
        try {
            DB::transaction(function () use ($data) {
                $order = DB::table('save_orders')->insert([
                    'user_id' => auth()->id(),
                    'order_id' => $data['order_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return $order;
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
