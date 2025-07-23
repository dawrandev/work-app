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

    public function destroy($locale, User $user)
    {
        $user->delete();

        Alert::success(__('User deleted successfully!'));

        return redirect()->route('admin.users.index');
    }
}
