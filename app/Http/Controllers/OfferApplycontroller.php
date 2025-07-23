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
            Alert::success(__('Success!'), __($result['message']));
            return redirect()->back();
        } else {
            Alert::error(__('Error!'), __($result['message']));
            return redirect()->back();
        }
    }

    public function show(int $id)
    {
        $applications = $this->offerApplyService->getUserApplications(auth()->id());
        $application = $applications->where('pivot.id', $id)->first();

        if (!$application) {
            abort(404, __('Application not found!'));
        }

        return view('offer-applies.show', compact('application'));
    }

    public function applicants($locale, $offerId)
    {
        $applicants = $this->offerApplyService->applicants($offerId);

        return view('pages.user.profile.offer-applicants', compact('applicants'));
    }

    public function respond($locale, Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $applicant = $this->offerApplyService->updateApprovalStatus($id, $request->status);

        Alert::success(__('The applicant was responded to'));

        return redirect()->back();
    }
}
