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
                <form action="{{ action('User\DiaryController@update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-secondary">記録する</button>
                    </div>
                    
                    <input type="hidden" name="selected_date" value="{{ $selected_date }}">
                    
                    <div class="form-group row">
                        <div class="col-md-10 mx-auto">
                            @if($diary) {{ $diary->image_path }} @endif
                            
                            <label for="image"></label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-check row">
                        <div class="col-md-10 mx-auto">
                            <label class="form-check-label" for="image_remove"></label>
                            <input type="checkbox" class="form-check-input" name="image_remove" value="true">画像を削除</input>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10 mx-auto">
                            <label for="diary_text"></label>
                            <textarea class="form-control" name="diary_text" rows="20">@if($diary) {{ $diary->diary_text }} @endif</textarea>
                        </div>
                    </div>
                </form>
                
                <div class="text-right">
                    <a href="diary_delete?selectedDate={{ $selected_date }}" class="btn btn-outline-danger" role="button">削除する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
