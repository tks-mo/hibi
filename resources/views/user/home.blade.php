@extends('layouts.user')

@section('title', 'hibi - home')

@push('css')
<link href="{{ secure_asset('css/calendar.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="text-center">
                <a class="y" href="?ym={{ $prev }}">&lt;</a>
                    <span class="month">{{ $month }}</span>
                <a class="y" href="?ym={{ $next }}">&gt;</a>
            </div>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>日</th>
                        <th>月</th>
                        <th>火</th>
                        <th>水</th>
                        <th>木</th>
                        <th>金</th>
                        <th>土</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weeks as $week)
                        {!! $week !!}
                    @endforeach
                </tbody>
            </table>
            
            <p>テスト</p>
        </div>
    </div>
</div>
@endsection
