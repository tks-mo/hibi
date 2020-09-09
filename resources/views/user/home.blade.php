@extends('layouts.user')
@section('title', 'MyCalendar')

@push('css')
<link href="{{ secure_asset('css/calendar.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        
        <div>
            <a href="?ym={{ $prev }}">&lt;</a>
            <span class="month">{{ $month }}</span>
            <a href="?ym={{ $next }}">&gt;</a>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            @foreach ($weeks as $week)
                {!! $week !!}
            @endforeach
        </table>

    </div>
    {{-- .content --}}
</div>
{{-- .flex-center .position-ref .full-height --}}

@endsection
