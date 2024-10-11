{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Roles" icon="la la-group" :link="backpack_url('roles')" />
<x-backpack::menu-item title="Users" icon="la la-user" :link="backpack_url('users')" />
<x-backpack::menu-item title="Course Headings" icon="la la-list" :link="backpack_url('course-fields')" />
<x-backpack::menu-item title="Course Topics" icon="la la-folder" :link="backpack_url('course-topics')" />
<x-backpack::menu-item title="Courses" icon="la la-book" :link="backpack_url('courses')" />
<x-backpack::menu-item title="Courses Video Details" icon="la la-video" :link="backpack_url('courses-video-details')" />
<x-backpack::menu-item title="Author Details" icon="la la-user" :link="backpack_url('author-details')" />
<x-backpack::menu-item title="Author Social Links" icon="la la-share-alt" :link="backpack_url('author-social-links')" />