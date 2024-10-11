<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('/dashboard', [ AdminController::class, 'dashboard' ])->name('admin.dashboard');
    Route::crud('roles', 'RolesCrudController');
    Route::crud('users', 'UsersCrudController');
    Route::crud('course-fields', 'CourseFieldsCrudController');
    Route::crud('courses', 'CoursesCrudController');
    Route::crud('course-topics', 'CourseTopicsCrudController');
    Route::crud('courses-video-details', 'CoursesVideoDetailsCrudController');
    Route::crud('author-details', 'AuthorDetailsCrudController');
    Route::crud('author-social-links', 'AuthorSocialLinksCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
