@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>{{ $Ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class ="card card-body">
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        @if($diary['image_path']) <img src="{{ asset('/storage/image/' . $diary->image_path) }}"> @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        @if($diary['diary_text']) {{ $diary->diary_text }} @endif
                    </div>
                </div>
                
                <div class="text-right">
                    <a href="edit?selectedDate={{ $selectedDate }}" class="btn btn-outline-secondary" role="button">編集する</a>
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
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 text-right">
                <a href="create?selectedDate={{ $selectedDate }}" class="btn btn-outline-secondary" role="button">作成する</a>
            </div>
        </div>
    </div>
    
</div>
@endsection
