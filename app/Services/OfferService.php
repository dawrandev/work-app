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
            $offer = DB::transaction(function () use ($data, $request) {
                $data['user_id'] = auth()->id();
                $data['status'] = 'active';
                $data['approval_status'] = 'pending';

                $offer = $this->offerRepository->create($data);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('offers', $filename, 'public');
                        $offer->images()->create([
                            'image_path' => $filename,
                        ]);
                    }
                }
                return $offer;
            });
            return $offer;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUserOffers($user_id)
    {
        return $this->offerRepository->getUserOffers($user_id);
    }

    public function updateOffer($offer, array $data, $request)
    {
        try {
            DB::transaction(function () use ($offer, $data, $request) {
                $data['approval_status'] = 'pending';
                $offer = $this->offerRepository->update($offer, $data);

                if ($request->has('delete_images') && is_array($request->input('delete_images'))) {
                    $deleteImageIds = $request->input('delete_images');
                    foreach ($deleteImageIds as $imageId) {
                        $image = \App\Models\Image::find($imageId);
                        if ($image && $image->imageable_id == $offer->id && $image->imageable_type == Offer::class) {
                            $fullPath = 'offers/' . $image->image_path;
                            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($fullPath)) {
                                \Illuminate\Support\Facades\Storage::disk('public')->delete($fullPath);
                            }
                            $image->delete();
                        }
                    }
                }

                // Enforce image upload limit
                $existingCount = $offer->images()->count();
                $deleteCount = $request->has('delete_images') && is_array($request->input('delete_images')) ? count($request->input('delete_images')) : 0;
                $allowedNew = 3 - ($existingCount - $deleteCount);
                $allowedNew = max(0, $allowedNew);

                if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    $files = array_slice($files, 0, $allowedNew); // Only allow up to allowed
                    foreach ($files as $image) {
                        $filename = time() . '_' . \Illuminate\Support\Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('offers', $filename, 'public');
                        $offer->images()->create([
                            'image_path' => $filename,
                        ]);
                    }
                }
            });
            return $offer;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
