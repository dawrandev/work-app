<?php

namespace App\Http\Controllers;

use App\Filters\Filter;
use App\Http\Requests\OfferStoreRequest;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected OfferService $offerService) {}

    public function index(Request $request, Filter $filter)
    {
        $offers = $filter->apply(Offer::query(), $request->all());

        return view('pages.user.offers.index', ['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request)
    {
        $this->offerService->createOffer($request->validated(), $request);

        Alert::success(__('Offer created successfully'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, Offer $offer)
    {
        $offer->load(['images', 'category', 'district', 'type']);

        return view('pages.user.offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
