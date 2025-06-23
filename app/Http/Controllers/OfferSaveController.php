<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferSaveStoreRequest;
use App\Services\OfferSaveService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfferSaveController extends Controller
{
    public function __construct(
        protected OfferSaveService $offerSaveService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferSaveStoreRequest $request)
    {
        $this->offerSaveService->saveOffer($request->validated(), $request);

        Alert::success(__('Offer saved successfully!'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
