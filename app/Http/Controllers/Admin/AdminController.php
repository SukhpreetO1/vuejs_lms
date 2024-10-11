<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorDetails;
use App\Models\Courses;
use App\Models\Users;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user_count = Users::all()->count();
        $author_count = AuthorDetails::all()->count();
        $courses_count = Courses::all()->count();
        
        $data = [];
        $data['user_count'] = $user_count;
        $data['author_count'] = $author_count;
        $data['courses_count'] = $courses_count;
        
        return view('vendor.backpack.ui.dashboard', compact('data'));
    }
}
