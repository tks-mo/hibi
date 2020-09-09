@extends('layouts.user')
@section('title', 'MyDiary')

@section('content')
<div class="container">
    <div class="row">
        <h2>日記画面</h2>
        <a href="{{ url('user/edit') }}">
            <input type="submit" class="btn btn-secondary" value="編集する">
        </a>
    </div>
</div>
@endsection
