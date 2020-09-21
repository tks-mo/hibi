@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $ymd }}</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class ="card card-body">
                <form action="{{ action('User\DiaryController@update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-outline-secondary">記録する</button>
                    </div>
                    
                    <input type="hidden" name="selected_date" value="{{ $selected_date }}">
                    
                    <div class="form-group row">
                        <div class="col-md-10 mx-auto">
                            <label for="image"></label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-check row">
                        <div class="col-md-10 mx-auto">
                            <label class="form-check-label" for="image_remove"></label>
                            <input type="checkbox" class="form-check-input" name="image_remove" value="true">画像を削除</input>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10 mx-auto">
                            <label for="diary_text"></label>
                            <textarea class="form-control" name="diary_text" rows="20">@if($diary){{ $diary->diary_text }}@endif</textarea>
                        </div>
                    </div>
                </form>
                
                <div class="col-md-12 text-right">
                    <a href="delete?selectedDate={{ $selected_date }}" class="btn btn-outline-danger" role="button">削除する</a>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <h5 class="my-2">New</h5>
            <form action="" method="post" enctype="multipart/form-data">
                <!--@csrf-->
                <div class="card card-body">
                    <div class="form-group">
                        <label for="start_time">開始時間</label>
                        <select id="start_time" name="start_time">
                            <option>06:00</option><option>06:30</option>
                            <option>07:00</option><option>07:30</option>
                            <option>08:00</option><option>08:30</option>
                            <option>09:00</option><option>09:30</option>
                            <option>10:00</option><option>10:30</option>
                            <option>11:00</option><option>11:30</option>
                            <option>12:00</option><option>12:30</option>
                            <option>13:00</option><option>13:30</option>
                            <option>14:00</option><option>14:30</option>
                            <option>15:00</option><option>15:30</option>
                            <option>16:00</option><option>16:30</option>
                            <option>17:00</option><option>17:30</option>
                            <option>18:00</option><option>18:30</option>
                            <option>19:00</option><option>19:30</option>
                            <option>20:00</option><option>20:30</option>
                            <option>21:00</option><option>21:30</option>
                            <option>22:00</option><option>22:30</option>
                            <option>00:00</option><option>00:30</option>
                            <option>01:00</option><option>01:30</option>
                            <option>02:00</option><option>02:30</option>
                            <option>03:00</option><option>03:30</option>
                            <option>04:00</option><option>04:30</option>
                            <option>05:00</option><option>05:30</option>
                        </select>
                        
                        <label for="end_time">終了時間</label>
                        <select id="end_time" name="end_time">
                            <option>06:00</option><option>06:30</option>
                            <option>07:00</option><option>07:30</option>
                            <option>08:00</option><option>08:30</option>
                            <option>09:00</option><option>09:30</option>
                            <option>10:00</option><option>10:30</option>
                            <option>11:00</option><option>11:30</option>
                            <option>12:00</option><option>12:30</option>
                            <option>13:00</option><option>13:30</option>
                            <option>14:00</option><option>14:30</option>
                            <option>15:00</option><option>15:30</option>
                            <option>16:00</option><option>16:30</option>
                            <option>17:00</option><option>17:30</option>
                            <option>18:00</option><option>18:30</option>
                            <option>19:00</option><option>19:30</option>
                            <option>20:00</option><option>20:30</option>
                            <option>21:00</option><option>21:30</option>
                            <option>22:00</option><option>22:30</option>
                            <option>00:00</option><option>00:30</option>
                            <option>01:00</option><option>01:30</option>
                            <option>02:00</option><option>02:30</option>
                            <option>03:00</option><option>03:30</option>
                            <option>04:00</option><option>04:30</option>
                            <option>05:00</option><option>05:30</option>
                        </select>
                        
                        <label for="schedule_text"></label>
                        <input type="text" class="form-control" name="schedule_text">
                    </div>
                        
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-outline-secondary">登録する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <h5 class="my-3">Time Schedule</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="15%">開始</th>
                        <th width="15%">終了</th>
                        <th width="50%"></th>
                        <th width="20%"></th>
                    </tr>
                </thead>
                <tbody>
                    <!--foreach-->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href=""><button type="submit" class="btn btn-outline-danger">削除</button></a>
                        </td>
                    </tr>
                    <!--endforeach-->
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
