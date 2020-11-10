@extends('layouts.user')

@section('title', 'hibi - 日記編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="ymd-color">{{ $ymd }}</h2>
            <div class="text-right mb-2">
                <a href="{{ action('User\DiaryController@show', ['selectedDate' => $selectedDate]) }}" class="btn btn-color" role="button">戻る</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-10">
            <div class="card card-body border-0">
                <div class="text-danger">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                
                <form action="{{ action('User\DiaryController@update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-right mb-2">
                        <button type="submit" class="btn btn-color">記録する</button>
                    </div>
                    
                    <input type="hidden" name="selectedDate" value="{{ $selectedDate }}">
                    
                    @if($diary['image_path'] != null)
                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <img src="{{ $diary->image_path }}" class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="form-check row">
                            <div class="col-md-8 mx-auto">
                                <label class="form-check-label" for="image_remove"></label>
                                <input type="checkbox" class="form-check-input" name="image_remove" value="true">画像を削除する</input>
                            </div>
                        </div>
                    @endif
                    
                    <div class="form-group row">
                        <div class="col-md-8 mx-auto">
                            <label for="image"></label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-8 mx-auto">
                            <label for="diary_text"></label>
                            <textarea class="form-control" name="diary_text" maxlength="255" rows="10">@if($diary != null){{ $diary->diary_text }}@endif</textarea>
                        </div>
                    </div>
                </form>
                
                @if($diary != null)
                    <div class="text-right">
                        <a href="{{ action('User\DiaryController@diary_delete', ['id' => $diary->id]) }}">
                            <button type="submit" class="btn delete-btn-color btn-sm">削除する</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
