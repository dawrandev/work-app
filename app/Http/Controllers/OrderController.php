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

    public function index(Request $request)
    {
        $filters = $request->only(['category_id', 'district_id', 'type_id']);

        $orders = $this->orderService->getFilteredOrders($filters);

        return view('user.pages.orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        return view('user.pages.orders.create');
    }

    public function store(OrderStoreRequest $request)
    {
        $order = $this->orderService->createOrder($request->validated(), $request);

        Alert::success(__('Request sent successfully!'));

        return redirect()->route('orders.create');
    }

    public function show(Order $order)
    {
        return view('user.pages.orders.show', compact('order'));
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
