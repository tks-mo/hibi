@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>{{ $ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="{{ action('User\ScheduleController@create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="selected_date" value="{{ $selected_date }}">
                        
                        <label for="start_time">開始時間</label>
                        <input type="time" name="start_time" value="{{ old('start_time') }}">

                        <label for="end_time">終了時間</label>
                        <input type="time" name="end_time" value="{{ old('end_time') }}">

                        <label for="schedule_text"></label>
                        <input type="text" class="form-control" name="schedule_text" value="{{ old('schedule_text') }}" maxlength="20">
                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-secondary">登録する</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-4 text-danger">
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <h4 class="my-3">Time Schedule</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">開始</th>
                        <th width="10%">終了</th>
                        <th width="60%"></th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $s)
                    <tr>
                        <td>{{ substr($s->start_time, 0, 5) }}</td>
                        <td>{{ substr($s->end_time, 0, 5) }}</td>
                        <td>{{ $s->schedule_text }}</td>
                        <td>
                            <a href="{{ action('User\ScheduleController@schedule_delete', ['id' => $s->id]) }}">
                                <button type="submit" class="btn btn-outline-danger btn-sm">削除</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
