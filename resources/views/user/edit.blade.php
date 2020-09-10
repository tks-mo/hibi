@extends('layouts.user')

@section('title', 'MyDiary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>編集画面</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <form action="{{ action('User\DiaryController@create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class ="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-outline-secondary" value="記録する">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-10 mx-auto">
                                <label for="image"></label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        
                        <div class="form-check row">
                            <div class="col-md-10 mx-auto">
                                <label class="form-check-label" for="remove"></label>
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-10 mx-auto">
                                <label for="body"></label>
                                <textarea class="form-control" placeholder="日記" name="body" rows="20"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection
