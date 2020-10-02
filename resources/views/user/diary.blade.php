@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>{{ $ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class ="card card-body">
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <img class="card-img-top">
                        @if($diary) {{ $diary->image_path }} @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        @if($diary)
                            {{ $diary->diary_text }}
                        @endif
                    </div>
                </div>
                
                <div class="text-right">
                    <a href="edit?selectedDate={{ $selected_date }}" class="btn btn-outline-secondary" role="button">編集する</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <h4 class="my-3">Time Schedule</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="30%"></th>
                        <th width="60%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $s)
                    <tr>
                        <td>{{ substr($s->start_time, 0, 5) }} - {{ substr($s->end_time, 0, 5) }}</td>
                        <td>{{ $s->schedule_text }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12 text-right">
                <a href="create?selectedDate={{ $selected_date }}" class="btn btn-outline-secondary" role="button">編集する</a>
            </div>
        </div>
    </div>
    
</div>
@endsection
