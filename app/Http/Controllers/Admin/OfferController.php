<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Services\Admin\OfferService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct(protected OfferService $offerService)
    {
        // 
    }

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'status', 'approval_status', 'category_id']);
        $offers = $this->offerService->getOffers($filters);
        $categories = Category::all();

        return view('pages.admin.offers.index', compact('offers', 'categories'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, Offer $offer)
    {
        $offer = $this->offerService->getOfferById($offer->id);

        return view('pages.admin.offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($locale, Offer $offer)
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
    public function destroy($locale, Offer $offer)
    {
        $this->offerService->deleteOffer($offer->id);

        return redirect()->route('admin.offers.index');
    }

    /**
     * Approve the specified offer.
     */
    public function approve($locale, Offer $offer)
    {
        $this->offerService->approveOffer($offer->id);

        return redirect()->back();
    }

    /**
     * Reject the specified offer.
     */
    public function reject($locale, Offer $offer)
    {
        $this->offerService->rejectOffer($offer->id);

        return redirect()->back();
    }
}
