@extends('layouts.user')

@section('title', 'hibi - 日記')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="ymd-color">{{ $ymd }}</h2>
            <div class="text-right mb-1">
                <a href="home" class="btn btn-color" role="button">戻る</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-10">
            <div class="card card-body border-0">
                <div class="form-group row">
                    <div class="col-md-8 mx-auto">
                        @if($diary['image_path'])
                            <img src="{{ asset('/storage/image/' . $diary->image_path) }}" class="img-fluid">
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-8 mx-auto">
                        @if($diary['diary_text'])
                            {!! nl2br($diary->diary_text) !!}
                        @endif
                    </div>
                </div>
                
                <div class="text-right">
                    <a href="{{ action('User\DiaryController@edit', ['selectedDate' => $selectedDate]) }}" class="btn btn-color" role="button">編集する</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <h4 class="mt-5">Time Schedule</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="120"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedule as $s)
                        <tr>
                            <td>{{ substr($s->start_time, 0, 5) }} - {{ substr($s->end_time, 0, 5) }}</td>
                            <td>{{ $s->schedule_text }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12 text-right">
                <a href="{{ action('User\ScheduleController@create', ['selectedDate' => $selectedDate]) }}" class="btn btn-color" role="button">作成する</a>
            </div>
        </div>
    </div>
</div>
@endsection
