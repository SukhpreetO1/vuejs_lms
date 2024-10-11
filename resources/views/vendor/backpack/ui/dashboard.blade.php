@extends(backpack_view('blank'))

@php
    Widget::add()
    ->to('before_content')
    ->type('div')
    ->class('row mt-3')
    ->content([
        Widget::make()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start')
            ->accentColor('primary')
            ->ribbon(['bottom', 'la-user'])
            ->progressClass('progress-bar')
            ->value('<a href="/admin/users" class="no-underline">' . $data['user_count'] .'</a>')
            ->description('Total Users')
            ->progress(100 * $data['user_count'] / 100)
            ->hint($data['user_count'] > 100 ? 100 - $data['user_count'] . ' more coming' : ''),
        
        Widget::make()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start')
            ->accentColor('secondary')
            ->ribbon(['bottom', 'la-pencil'])
            ->progressClass('progress-bar')
            ->value('<a href="/admin/author-details" class="no-underline">' . $data['author_count'] .'</a>')
            ->description('Total Author')
            ->progress(100 * $data['author_count'] / 100)
            ->hint($data['author_count'] > 100 ? 100 - $data['author_count'] . ' more coming' : ''),
        
        Widget::make()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start')
            ->accentColor('success')
            ->ribbon(['bottom', 'la-book'])
            ->progressClass('progress-bar')
            ->value('<a href="/admin/courses" class="no-underline">' . $data['courses_count'] .'</a>')
            ->description('Total Courses')
            ->progress(100 * $data['courses_count'] / 100)
            ->hint($data['courses_count'] > 100 ? 100 - $data['courses_count'] . ' more coming' : ''),
    ]);
@endphp

@section('content')
@endsection
