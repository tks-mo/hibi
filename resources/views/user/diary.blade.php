@extends('layouts.user')

@section('title', 'hibi - 日記とタイムスケジュール')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2 class="text-info">{{ $ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-10">
            <div class ="card card-body bg border border-0">
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
                    <a href="edit?selectedDate={{ $selectedDate }}" class="btn btn-outline-secondary" role="button">編集する</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <h4 class="my-3">Time Schedule</h4>
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
                <a href="create?selectedDate={{ $selectedDate }}" class="btn btn-outline-secondary" role="button">作成する</a>
            </div>
        </div>
    </div>
</div>
@endsection
