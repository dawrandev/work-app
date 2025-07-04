<?php

namespace App\Http\Controllers;

use App\Filters\Filter;
use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfferController extends Controller
{

    public function __construct(protected OfferService $offerService) {}

    public function index(Request $request, Filter $filter)
    {
        $offers = $filter->apply(Offer::query(), $request->all());

        return view('pages.user.offers.index', ['offers' => $offers]);
    }


    public function create()
    {
        return view('pages.user.offers.create');
    }


    public function store(OfferStoreRequest $request)
    {
        $this->offerService->createOffer($request->validated(), $request);

        Alert::success(__('Offer created successfully'));

        return redirect()->back();
    }


    public function show($locale, Offer $offer)
    {
        $offer->load(['images', 'category', 'district', 'type']);

        return view('pages.user.offers.show', compact('offer'));
    }


    public function edit($locale, Offer $offer)
    {
        $offer->load(['category', 'subcategory', 'district', 'type', 'employmentType', 'user']);

        return view('pages.user.offers.edit', compact('offer'));
    }


    public function update($locale, OfferUpdateRequest $request, Offer $offer)
    {
        $offer = $this->offerService->updateOffer($offer, $request->validated(), $request);

        Alert::success(__('Offer Updated Successfully'));

        return redirect()->back();
    }

    public function destroy($locale, Offer $offer)
    {
        $offer->delete();

        Alert::success(__('Offer deleted succesfully'));

        return redirect()->back();
    }
}
