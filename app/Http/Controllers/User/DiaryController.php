<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;

use Auth;
use App\Day;
use App\Diary;
use App\Schedule;

class DiaryController extends Controller
{
    // 日記画面
    public function show(Request $request)
    {
        //日記とスケジュールの初期化処理
        $diary = null;
        $schedule = null;
        
        $selectedDate = $request->selectedDate;
        $ymd = date('Y年m月d日',strtotime($selectedDate));
        $user_id = Auth::id();
        
        // 選択された日付と一致するデータを取得する
        $day = Day::where('user_id', $user_id)->where('day_date', $selectedDate)->first();
        if ($day != null) {
            $diary = Diary::where('day_id', $day['id'])->first();
            $schedule = Schedule::where('day_id', $day['id'])->orderBy('start_time', 'asc')->get();
        }
        
        return view('user.diary', ['selectedDate' => $selectedDate, 'ymd' => $ymd, 'diary' => $diary, 'schedule' => $schedule]);
    }
    
    // 日記編集画面
    public function edit(Request $request)
    {
        //日記の初期化処理
        $diary = null;
        
        $selectedDate = $request->selectedDate;
        $ymd = date('Y年m月d日',strtotime($selectedDate));
        $user_id = Auth::id();
        
        // 選択された日付と一致するデータを取得する
        $day = Day::where('user_id', $user_id)->where('day_date', $selectedDate)->first();
        if ($day != null) {
            $diary = Diary::where('day_id', $day['id'])->first();
        }
        
        return view('user.edit', ['selectedDate' => $selectedDate, 'ymd' => $ymd, 'diary' => $diary]);
    }
    
    // 日記の登録と更新
    public function update(Request $request)
    {
        $this->validate($request, Diary::$rules);
        
        //日記の初期化処理
        $diary = null;
        
        $selectedDate = $request->selectedDate;
        $user_id = Auth::id();
        
        $day = Day::where('user_id', $user_id)->where('day_date', $selectedDate)->first();
        if ($day != null) {
            $diary = Diary::where('day_id', $day['id'])->first();
        } else {
            // dayテーブルにデータがない場合は登録する
            $day = new Day();
            $day->day_date = $selectedDate;
            $day->user_id = $user_id;
            $day->save();
        }
        
        if(empty($diary)) {
            
            // 日記を新しく登録する
            $diary = new Diary();
            
            if ($request->file('image')) {
                $path = Storage::disk('s3')->putFile('/',$request->file('image'),'public');
                $diary->image_path = Storage::disk('s3')->url($path);
            } else {
                $diary->image_path = null;
            }
            
            $diary->diary_text = $request->diary_text;
            $diary->day_id = $day->id;
            $diary->save();
            
        } else {
            
            //日記を編集し更新する
            if ($request->image_remove == 'true') {
                $diary->image_path = null;
            } elseif ($request->file('image')) {
                $path = Storage::disk('s3')->putFile('/',$request->file('image'),'public');
                $diary->image_path = Storage::disk('s3')->url($path);
            }
            
            $diary->diary_text = $request->diary_text;
            $diary->save();
            
        }
        
        return redirect('user/home');
    }
    
    //日記の削除
    public function diary_delete(Request $request)
    {
        $diary = Diary::find($request->id);
        $diary->delete();
        
        return redirect('user/home');
    }
}
