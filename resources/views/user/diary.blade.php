@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>日記画面(yyyy/mm/dd)</h2>
        </div>
        
        <div class="col-md-6 text-right">
            <a href="" class="btn btn-outline-secondary" role="button">編集する</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class ="card">
                <img class="card-img-top">
                <div class="card-body">
                    <div class="mx-auto">
                        <P></P>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <h5 class="my-3">Time Schedule</h5>
        </div>
    </div>
    
</div>
@endsection
