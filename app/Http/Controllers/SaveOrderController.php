<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderSaveStoreRequest;
use App\Services\SaveOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SaveOrderController extends Controller
{
    public function __construct(
        protected SaveOrderService $saveOrderService
    ) {
        // Middleware can be added here if needed
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(OrderSaveStoreRequest $request)
    {
        $order = $this->saveOrderService->saveOrder($request->validated(), $request);

        Alert::success(__('Order saved successfully!'));

        return redirect()->route('orders.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
