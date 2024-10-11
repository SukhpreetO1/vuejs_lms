<?php

namespace App\Http\Controllers;

use App\Models\CourseFields;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function index()
    {
        $course_fields = CourseFields::all();
        return Inertia::render('Dashboard', [
            'course_fields' => $course_fields
        ]);
    }
}
