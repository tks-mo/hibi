<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Day;
use App\Schedule;

class ScheduleController extends Controller
{
    public function create(Request $request)
    {
        $selectedDate = $request->selectedDate;
        $ymd = date('Y年m月d日',strtotime($selectedDate));
        
        // 選択された日付と一致するデータを取得する
        $day = Day::where('day_date', $selectedDate)->first();
        $schedule = Schedule::where('day_id', $day['id'])->orderBy('start_time', 'asc')->get();
        
        return view('user.create', ['selectedDate' => $selectedDate, 'ymd' => $ymd, 'schedule' => $schedule]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, Schedule::$rules);
        
        $selectedDate = $request->selectedDate;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        
        $day = Day::where('day_date', $selectedDate)->first();
        
        //パターン1：登録したい時間帯の中から開始するスケジュールが既にある
        $registered1 = Schedule::where('day_id', $day['id'])->where('start_time', '>=', $start_time)->where('start_time', '<', $end_time)->exists();
        //パターン2：登録したい時間帯の中で終了するスケジュールが既にある
        $registered2 = Schedule::where('day_id', $day['id'])->where('end_time', '>', $start_time)->where('end_time', '<=', $end_time)->exists();
        //パターン3：登録したい時間帯の中に開始と終了が入るスケジュールが既にある
        $registered3 = Schedule::where('day_id', $day['id'])->where('start_time', '<', $start_time)->where('end_time', '>', $end_time)->exists();

        if ($registered1 || $registered2 || $registered3) {
            //パターン1、2、3のどれかにあてはまる場合は、DBに保存しない
            return back()->withInput()->with('registered', '・指定された時間帯は既に登録済みです。');
        } else {
            // どれにもあてはまらない場合は、DBに保存する
            $day = Day::firstOrCreate(['day_date' => $selectedDate]);
            
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
    
    public function schedule_delete(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        
        return back()->withInput();
    }
}
