<!-- layouts/user.blade.phpを読み込む-->
@extends('layouts.user')

@section('title', 'MyDiary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>日記編集画面</h2>
            
            <div class ="card-body bg-white">
                <form action="{{ action('User\DiaryController@create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-md-11 text-right">
                            <input type="submit" class="btn btn-secondary" value="更新する">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 mx-auto">
                            <label class="col" for="image"></label>
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-10 mx-auto">
                            <label class="col" for="body"></label>
                            <textarea class="form-control" placeholder="日記" name="body" rows="20"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
