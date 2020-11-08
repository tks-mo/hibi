<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Day;
use App\Schedule;

class ScheduleController extends Controller
{
    //スケジュール作成画面
    public function create(Request $request)
    {
        //スケジュールの初期化処理
        $schedule = null;
        
        $selectedDate = $request->selectedDate;
        $ymd = date('Y年m月d日',strtotime($selectedDate));
        $user_id = Auth::id();
        
        // 選択された日付と一致するデータを取得する
        $day = Day::where('user_id', $user_id)->where('day_date', $selectedDate)->first();
        if ($day != null) {
            $schedule = Schedule::where('day_id', $day['id'])->orderBy('start_time', 'asc')->get();
        }
        
        return view('user.create', ['selectedDate' => $selectedDate, 'ymd' => $ymd, 'schedule' => $schedule]);
    }
    
    //スケジュールの登録
    public function store(Request $request)
    {
        $this->validate($request, Schedule::$rules);
        
        $user_id = Auth::id();
        $selectedDate = $request->selectedDate;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        
        $day = Day::where('user_id', $user_id)->where('day_date', $selectedDate)->first();
        
        //パターン1:登録したい時間帯の中から開始するスケジュールが既にある
        $registered1 = Schedule::where('day_id', $day['id'])->where('start_time', '>=', $start_time)->where('start_time', '<', $end_time)->exists();
        //パターン2:登録したい時間帯の中で終了するスケジュールが既にある
        $registered2 = Schedule::where('day_id', $day['id'])->where('end_time', '>', $start_time)->where('end_time', '<=', $end_time)->exists();
        //パターン3:登録したい時間帯の中に開始と終了が入るスケジュールが既にある
        $registered3 = Schedule::where('day_id', $day['id'])->where('start_time', '<', $start_time)->where('end_time', '>', $end_time)->exists();
        
        if ($registered1 || $registered2 || $registered3) {
            //パターン1,2,3のどれかにあてはまる場合は登録しない
            return back()->withInput()->with('registered', '・指定された時間帯は既に登録済みです。');
        } else {
            // どれにもあてはまらない場合は登録する
            // dayテーブルにデータがない場合は登録する
            if (empty($day)) {
                $day = new Day();
                $day->day_date = $selectedDate;
                $day->user_id = Auth::id();
                $day->save();
            }
            
            $schedule = new Schedule();
            $schedule->fill([
                'start_time' => $start_time,
                'end_time' => $end_time,
                'schedule_text' => $request->schedule_text,
                'day_id' => $day->id,
                ]);
                
            $schedule->save();
            
            return back()->withInput();
        }
    }
    
    //スケジュールの削除
    public function schedule_delete(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        
        return back()->withInput();
    }
}
