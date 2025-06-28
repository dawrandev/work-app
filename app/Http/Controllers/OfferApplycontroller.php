<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferApplyStoreRequest;
use App\Services\OfferApplyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class OfferApplyController extends Controller
{
    public function __construct(private OfferApplyService $offerApplyService) {}

    public function index(Request $request)
    {
        try {
            if ($request->ajax() && $request->has('offer_id')) {
                $status = $this->offerApplyService->checkApplyStatus(auth()->id());
                return response()->json($status);
            }

            $applications = $this->offerApplyService->getUserApplications(auth()->id());
            return view('offer-applies.index', compact('applications'));
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
            throw $e;
        }
    }

    public function store(OfferApplyStoreRequest $request)
    {
        $result = $this->offerApplyService->createApplication($request->validated());

        if ($result['success']) {
            Alert::success('Muvaffaqiyat!', $result['message']);
            return redirect()->back();
        } else {
            Alert::error('Xatolik!', $result['message']);
            return redirect()->back();
        }
    }

    public function show(int $id)
    {
        $applications = $this->offerApplyService->getUserApplications(auth()->id());
        $application = $applications->where('pivot.id', $id)->first();

        if (!$application) {
            abort(404, 'Ariza topilmadi!');
        }

        return view('offer-applies.show', compact('application'));
    }

    public function destroy(int $id)
    {
        // Pivot table'dan o'chirish logikasi
        // try {
        //     $user = auth()->user();
        //     $deleted = $user->appliedOffers()->wherePivot('id', $id)->detach();

        //     if ($deleted) {
        //         return response()->json([
        //             'success' => true,
        //             'message' => 'Ariza muvaffaqiyatli bekor qilindi!'
        //         ]);
        //     } else {
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'Ariza topilmadi!'
        //         ], 404);
        //     }
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Arizani bekor qilishda xatolik yuz berdi.'
        //     ], 500);
        // }
    }
}
