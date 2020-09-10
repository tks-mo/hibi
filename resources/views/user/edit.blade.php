@extends('layouts.user')

@section('title', 'MyDiary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>編集画面</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <form action="{{ action('User\DiaryController@diary_create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class ="card card-body">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-outline-secondary">記録する</button>
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
            </form>
        </div>
    
        <div class="col-md-4">
            <form action="{{ action('User\ScheduleController@schedule_create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body">
                    <div class="form-group">
                        <label for="start_time">開始時間</label>
                        <input type="time" name="start_time" value="00:00">
                   
                        <label for="end_time">終了時間</label>
                        <input type="time" name="end_time" value="00:00">
                        
                        <label for="schedule_text"></label>
                        <input type="text" class="form-control" name="schedule_text">
                    </div>
                        
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-outline-secondary">追加する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-10">
            <h4>登録済み</h4>
            <table class="table">
                <tr>
                    <td>開始時間</td>
                    <td>終了時間</td>
                    <td>テキスト</td>
                    <td>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
</div>
@endsection
