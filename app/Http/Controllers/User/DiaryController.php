<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Day;
use App\Diary;
use App\Schedule;

class DiaryController extends Controller
{
    public function show(Request $request)
    {
        $selectedDate = $request->selectedDate;
        $ymd = date('Y年m月d日',strtotime($selectedDate));
        
        // 選択された日付と一致するデータを取得する
        $day = Day::where('day_date', $selectedDate)->first();
        $diary = Diary::where('day_id', $day['id'])->first();
        $schedule = Schedule::where('day_id', $day['id'])->orderBy('start_time', 'asc')->get();
        
        return view('user.diary', ['selectedDate' => $selectedDate, 'ymd' => $ymd, 'diary' => $diary, 'schedule' => $schedule]);
    }
    
    public function edit(Request $request)
    {
        $selectedDate = $request->selectedDate;
        $ymd = date('Y年m月d日',strtotime($selectedDate));
        
        $day = Day::where('day_date', $selectedDate)->first();
        $diary = Diary::where('day_id', $day['id'])->first();

        return view('user.edit', ['selectedDate' => $selectedDate, 'ymd' => $ymd, 'diary' => $diary]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Diary::$rules);
        
        $selectedDate = $request->selectedDate;
        $day = Day::where('day_date', $selectedDate)->first();
        $diary = Diary::where('day_id', $day['id'])->first();
        
        // 日記を新しく保存する場合
        if (empty($diary)){
            
            $day = Day::firstOrCreate(['day_date' => $selectedDate]);
            
            $diary = new Diary;
            
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/image');
                $diary->fill(['image_path' => basename($path)]);
            } else {
                $diary->image_path = null;
            }
            
            $diary->fill(['diary_text' => $request->diary_text]);
            $diary->fill(['day_id' => $day->id]);
            $diary->save();
            
        // 日記を変更し保存する場合
        } else {
            
            if ($request->image_remove == 'true') {
                Storage::disk('local')->delete('public/image/' . $diary->image_path);
                $diary->image_path = null;
            } elseif ($request->file('image')) {
                Storage::disk('local')->delete('public/image/' . $diary->image_path);
                $path = $request->file('image')->store('public/image');
                $diary->fill(['image_path' => basename($path)]);
            }
            
            $diary->fill(['diary_text' => $request->diary_text]);
            $diary->save();
            
        }
        
        return redirect('user/home');
    }
    
    public function diary_delete(Request $request)
    {
        $diary = Diary::find($request->id);
        
        if($diary->image_path) {
             Storage::disk('local')->delete('public/image/' . $diary->image_path);
        }
        $diary->delete();
        
        return redirect('user/home');
    }
}
