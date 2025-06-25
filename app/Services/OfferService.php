<?php

namespace App\Services;

use App\Http\Requests\OfferStoreRequest;
use App\Models\Offer;
use App\Repositories\OfferRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class OfferService
{
    public function __construct(protected OfferRepository $offerRepository) {}

    public function createOffer(array $data, $request)
    {
        try {
            DB::transaction(function () use ($data, $request) {
                $data['user_id'] = auth()->id();
                $data['status'] = 'active';
                $data['approval_status'] = 'pending';

                $offer = $this->offerRepository->create($data);

                if ($request->hasFile('service_images')) {
                    foreach ($request->file('service_images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs("offers", $filename, 'public');
                        $offer->images()->create([
                            'image_path' => $filename,
                        ]);
                    }
                }
            });
        } catch (Exception $e) {
            throw $e;
        }
    }
}
