@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>{{ $Ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-10">
            <div class ="card card-body bg border border-0">
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-secondary">記録する</button>
                    </div>
                    
                    <input type="hidden" name="selectedDate" value="{{ $selectedDate }}">
                    
                    <div class="form-group row">
                        <div class="col-md-8 mx-auto">
                            @if($diary['image_path']) <img src="{{ asset('/storage/image/' . $diary->image_path) }}" class="img-fluid"> @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-8 mx-auto">
                            <label for="image"></label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-check row">
                        <div class="col-md-8 mx-auto">
                            <label class="form-check-label" for="image_remove"></label>
                            <input type="checkbox" class="form-check-input" name="image_remove" value="true">画像を削除する</input>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-8 mx-auto">
                            <label for="diary_text"></label>
                            <textarea class="form-control" name="diary_text" maxlength="255" rows="10">@if($diary['diary_text']) {{ $diary->diary_text }} @endif</textarea>
                        </div>
                    </div>
                </form>
                
                <div class="text-right">
                    <a href="diary_delete?selectedDate={{ $selectedDate }}" class="btn btn-outline-danger" role="button">削除する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
