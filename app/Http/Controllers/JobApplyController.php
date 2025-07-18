<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplyStoreRequest;
use App\Services\JobApplyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class JobApplyController extends Controller
{
    public function __construct(private JobApplyService $jobApplyService) {}

    public function index(Request $request)
    {
        try {
            if ($request->ajax() && $request->has('job_id')) {
                $status = $this->jobApplyService->checkApplyStatus(auth()->id());
                return response()->json($status);
            }

            $applications = $this->jobApplyService->getUserApplications(auth()->id());
            return view('job-applies.index', compact('applications'));
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
            throw $e;
        }
    }

    public function store(JobApplyStoreRequest $request)
    {
        $result = $this->jobApplyService->createApplication($request->validated());

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
        $applications = $this->jobApplyService->getUserApplications(auth()->id());
        $application = $applications->where('pivot.id', $id)->first();

        if (!$application) {
            abort(404, 'Ariza topilmadi!');
        }

        return view('job-applies.show', compact('application'));
    }

    public function applicants($locale, $jobId)
    {
        $applicants = $this->jobApplyService->applicants($jobId);

        return view('pages.user.profile.job-applicants', compact('applicants'));
    }

    public function respond($locale, Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $applicant = $this->jobApplyService->updateApprovalStatus($id, $request->status);

        Alert::success(__('The applicant was responded to'));

        return redirect()->back();
    }

    public function destroy(int $id)
    {
        // Pivot table'dan o'chirish logikasi
        // try {
        //     $user = auth()->user();
        //     $deleted = $user->appliedJobs()->wherePivot('id', $id)->detach();

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
