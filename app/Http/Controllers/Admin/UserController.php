<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        // 
    }
    public function index()
    {
        return view('pages.admin.users.index');
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
    public function show($locale, User $user)
    {
        $user->load([
            'jobs.category',
            'jobs.subcategory',
            'jobs.district',
            'offers.category',
            'offers.subcategory',
            'offers.district'
        ]);
        return view('pages.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy($locale, User $user)
    {
        $user->delete();

        Alert::success(__('User deleted successfully'));

        return redirect()->route('admin.users.index');
    }
}
