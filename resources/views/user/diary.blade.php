@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class ="card card-body">
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <img class="card-img-top">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        @if($diary)
                            {{ $diary->diary_text }}
                        @endif
                    </div>
                </div>
                
                <div class="col-md-12 text-right">
                    <a href="edit?selectedDate={{ $selected_date }}" class="btn btn-outline-secondary" role="button">編集する</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <h5 class="my-3">Time Schedule</h5>
        </div>
    </div>
    
</div>
@endsection
