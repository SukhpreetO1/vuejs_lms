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
            ->ribbon(['top', 'la-user'])
            ->progressClass('progress-bar')
            ->value($user_count . '<a href="/admin/users" class="text-white">View Details</a>')
            ->description('Total Users')
            ->progress(100 * $user_count / 100)
            ->hint($user_count > 100 ? 100 - $user_count . ' more coming' : ''),
    ]);
@endphp

@section('content')
@endsection
