<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user_count = Users::all()->count();
        return view('vendor.backpack.ui.dashboard', compact('user_count'));
    }
}
