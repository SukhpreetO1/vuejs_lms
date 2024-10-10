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
            ->value(239)
            ->description('Total Users')
            ->progress(100 * (int)239 / 1000)
            ->hint(1000 - 239 . ' more coming'),
    ]);

@endphp

@section('content')
@endsection
