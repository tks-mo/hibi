@extends('layouts.user')

@section('title', 'hibi - カレンダー')

@push('css')
<link href="{{ secure_asset('css/calendar.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="text-center">
                <a class="y" href="?ym={{ $prev }}">&lt;</a>
                    <span class="month">{{ $month }}</span>
                <a class="y" href="?ym={{ $next }}">&gt;</a>
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
    </div>
</div>
@endsection
