<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferUpdateRequest;
use App\Models\Category;
use App\Models\Offer;
use App\Services\Admin\OfferService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function update($locale, Request $request, Offer $offer)
    {
        try {
            $offer = $this->offerService->updateOfferStatus($request->approval_status, $offer);
            return redirect()->route('admin.offers.index');
            Alert::success(__('Offer approval status updated successfully'));
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($locale, Offer $offer)
    {
        $this->offerService->deleteOffer($offer->id);

        return redirect()->route('admin.offers.index');
    }
}
