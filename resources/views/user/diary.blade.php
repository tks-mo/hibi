@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>日記画面(yyyy/mm/dd)</h2>
        </div>
        
        <div class="col-md-6 text-right">
            <a href="{{ action('User\DiaryController@edit_show') }}" class="btn btn-outline-secondary" role="button">編集する</a>
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
            
            <div style="height:40px;" class="time">00:00</div>
            <div style="height:40px;" class="time">00:30</div>
            <div style="height:40px;" class="time">01:00</div>
            <div style="height:40px;" class="time">01:30</div>
            <div style="height:40px;" class="time">02:00</div>
            <div style="height:40px;" class="time">02:30</div>
            <div style="height:40px;" class="time">03:00</div>
            <div style="height:40px;" class="time">03:30</div>
            <div style="height:40px;" class="time">04:00</div>
            <div style="height:40px;" class="time">04:30</div>
            <div style="height:40px;" class="time">05:00</div>
            <div style="height:40px;" class="time">05:30</div>
            <div style="height:40px;" class="time">06:00</div>
            <div style="height:40px;" class="time">06:30</div>
            <div style="height:40px;" class="time">07:00</div>
            <div style="height:40px;" class="time">07:30</div>
            <div style="height:40px;" class="time">08:00</div>
            <div style="height:40px;" class="time">08:30</div>
            <div style="height:40px;" class="time">09:00</div>
            <div style="height:40px;" class="time">09:30</div>
            <div style="height:40px;" class="time">10:00</div>
            <div style="height:40px;" class="time">10:30</div>
            <div style="height:40px;" class="time">11:00</div>
            <div style="height:40px;" class="time">11:30</div>
            <div style="height:40px;" class="time">12:00</div>
            <div style="height:40px;" class="time">12:30</div>
            <div style="height:40px;" class="time">13:00</div>
            <div style="height:40px;" class="time">13:30</div>
            <div style="height:40px;" class="time">14:00</div>
            <div style="height:40px;" class="time">14:30</div>
            <div style="height:40px;" class="time">15:00</div>
            <div style="height:40px;" class="time">15:30</div>
            <div style="height:40px;" class="time">16:00</div>
            <div style="height:40px;" class="time">16:30</div>
            <div style="height:40px;" class="time">17:00</div>
            <div style="height:40px;" class="time">17:30</div>
            <div style="height:40px;" class="time">18:00</div>
            <div style="height:40px;" class="time">18:30</div>
            <div style="height:40px;" class="time">19:00</div>
            <div style="height:40px;" class="time">19:30</div>
            <div style="height:40px;" class="time">20:00</div>
            <div style="height:40px;" class="time">20:30</div>
            <div style="height:40px;" class="time">21:00</div>
            <div style="height:40px;" class="time">21:30</div>
            <div style="height:40px;" class="time">22:00</div>
            <div style="height:40px;" class="time">22:30</div>
            <div style="height:40px;" class="time">23:00</div>
            <div style="height:40px;" class="time">23:30</div>
            <div style="height:40px;" class="time">00:00</div>
            
        </div>
    </div>
    
</div>
@endsection
