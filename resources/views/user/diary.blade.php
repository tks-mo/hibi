@extends('layouts.user')
@section('title', 'MyDiary')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>日記画面</h2>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-8">
            <a href="{{ action('User\DiaryController@edit') }}"><input type="submit" class="btn btn btn-outline-secondary" value="編集する"></a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class ="card">
                <img class="card-img-top">
                <div class="card-body">
                    <div class="col-md-10 mx-auto">
                        <P>日記</P>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
@endsection
