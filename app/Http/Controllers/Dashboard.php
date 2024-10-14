<?php

namespace App\Http\Controllers;

use App\Models\CourseFields;
use App\Models\CourseTopics;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function index()
    {
        $course_fields = CourseFields::all();
        return Inertia::render('Dashboard', [ 'course_fields' => $course_fields ]);
    }

    public function course_topics(Request $request, $course_topics)
    {
        $course_fields = CourseFields::all();
        $course_field_data = CourseFields::where('title', $course_topics)->first();
        $course_topics = CourseTopics::where('course_field_id', $course_field_data->id)->get();
        return Inertia::render('Dashboard', ['course_topics' => $course_topics, 'course_fields' => $course_fields]);
    }
}
