@extends('layouts.user')
@section('title', 'MyDiary')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>日記画面</h2>
        </div>
        
        <div class="col-md-6 text-right">
            <a href="{{ action('User\DiaryController@edit_show') }}"><button type="submit" class="btn btn-outline-secondary">編集する</button></a>
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
        
        <div class="col-md-4">
            
        </div>
    </div>
        
</div>
@endsection
