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
        $offers = $this->offerService->getOffers($request->only(['search', 'status', 'approval_status', 'category_id']));

        return view('pages.admin.offers.index', compact('offers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($locale, Offer $offer)
    {
        $offer = $this->offerService->getOfferById($offer->id);

        return view('pages.admin.offers.show', compact('offer'));
    }

    public function edit($locale, Offer $offer)
    {
        //
    }

    public function update($locale, OfferUpdateRequest $request, Offer $offer)
    {

        $offer = $this->offerService->updateOfferStatus($offer, $request->approval_status);

        if ($offer) {
            Alert::success(__('Offer approval status updated successfully'));
        } else {
            Alert::error(__('Error updating approval status'));
        }

        return redirect()->route('admin.offers.index');
    }

    public function destroy($locale, Offer $offer)
    {
        $this->offerService->deleteOffer($offer->id);

        Alert::success(__('Offer deleted successfully'));

        return redirect()->route('admin.offers.index');
    }
}
