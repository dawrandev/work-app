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

    public function store(OfferSaveStoreRequest $request)
    {
        try {
            $this->offerSaveService->saveOffer($request->validated(), $request);
            Alert::success(__('Offer saved successfully!'));
        } catch (\Exception $e) {
            Alert::info(__('Attention'), $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->back();
    }

    public function destroy($locale, string $id)
    {
        $this->offerSaveService->destroyOffer($id);

        Alert::success(__('Offer deleted succesfully!'));

        return redirect()->back();
    }
}
