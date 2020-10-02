<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ScheduleRequest;

use App\Schedule;

class ScheduleController extends Controller
{
    public function add(Request $request)
    {
        $selected_date = $request->selectedDate;
        
        $y = intval(substr($selected_date, 0, 4));
        $m = intval(substr($selected_date, 4, 2));
        $d = intval(substr($selected_date, 6, 2));
        $ymd = "$y 年 $m 月 $d 日";
        
        $schedules = Schedule::where('schedule_date', $selected_date)->orderBy('start_time', 'asc')->get();
        
        // dd($items);
        
        return view('user.create', ['selected_date' => $selected_date, 'ymd' => $ymd, 'schedules' => $schedules]);
    }
    
    public function create(ScheduleRequest $request)
    {
        $schedule = new Schedule();
        
        $schedule->fill([
            'schedule_date' => $request->selected_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'schedule_text' => $request->schedule_text,
        ]);
        
        $schedule->save();
        
        // dd($schedule);
        
        return redirect('user/create');
    }
    
    public function schedule_delete(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        
        return redirect('user/create');
    }
}
