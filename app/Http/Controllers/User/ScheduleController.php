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
        $day = Day::firstOrCreate(['day_date' => $selectedDate]);
        
        // スケジュールを保存する
        $schedule = new Schedule();
        $schedule->fill([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'schedule_text' => $request->schedule_text,
            'day_id' => $day->id,
            ]);
            
        $schedule->save();
        
        return back()->withInput();
    }
    
    public function schedule_delete(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        
        return back()->withInput();
    }
}
