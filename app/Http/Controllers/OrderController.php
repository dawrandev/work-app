<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderImage;
use App\Services\OrderService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {
        // 
    }

    public function index()
    {
        return view('user.pages.orders.index');
    }

    public function create()
    {
        return view('user.pages.orders.create');
    }

    public function store(OrderStoreRequest $request)
    {
        $order = $this->orderService->createOrder($request->validated(), $request);

        return redirect()->route('orders.create')->withSuccess('alert', [
            'type' => 'success',
            'message' => __('Request sent successfully!')
        ]);
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
