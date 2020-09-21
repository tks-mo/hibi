<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Day;
use App\Diary;

class DiaryController extends Controller
{
    public function show(Request $request)
    {
        $selected_date = $request->selectedDate;
        
        $diary_id = Day::where('date', $selected_date)->value('diary_id');
        
        $diary = Diary::find($diary_id);
   
        $y = intval(substr($selected_date, 0, 4));
        $m = intval(substr($selected_date, 4, 2));
        $d = intval(substr($selected_date, 6, 2));
        $ymd = "$y 年 $m 月 $d 日";
        
        return view('user.diary', ['selected_date' => $selected_date, 'diary' => $diary, 'ymd' => $ymd]);
    }
    
    public function edit(Request $request)
    {
        $selected_date = $request->selectedDate;
        
        $diary_id = Day::where('date', $selected_date)->value('diary_id');
        
        $diary = Diary::find($diary_id);
        
        $y = intval(substr($selected_date, 0, 4));
        $m = intval(substr($selected_date, 4, 2));
        $d = intval(substr($selected_date, 6, 2));
        $ymd = "$y 年 $m 月 $d 日";
        
        return view('user.edit', ['selected_date' => $selected_date, 'diary' => $diary, 'ymd' => $ymd]);
    }
    
    public function update(Request $request)
    {
        $selected_date = $request->selected_date;
        $diary_id = Day::where('date', $selected_date)->value('diary_id');
        $diary = Diary::find($diary_id);
        
        if(empty($diary)) {
            
            $diary = new Diary();

            if (isset($request->diary_text)) {
                $diary->fill(['diary_text' => $request->diary_text]);
            } else {
                $diary->diary_text = null;
            }
            
            if(isset($request->image)) {
                $path = $request->file('image')->store('public/image');
                $diary->image_path = basename($path);
            } else {
                $diary->image_path = null;
            }
            
            if ($diary->diary_text || $diary->image_path) {
                $diary->save();
                
                $day = new Day;
                $day->fill(['diary_id' => $diary->id]);
                $day->fill(['date' => $request->selected_date]);
                $day->save();
            } else {
                unset($diary);
            }
            
        } else {
            
            if (isset($request->diary_text)) {
                $diary->fill(['diary_text' => $request->diary_text]);
            } else {
                $diary->diary_text = null;
            }
            
            if(isset($request->image)) {
                $path = $request->file('image')->store('public/image');
                $diary->image_path = basename($path);
            } elseif(isset($request->remove)) {
                $diary->image_path = null;
            }
            
            if ($diary->diary_text || $diary->image_path) {
                $diary->save();
            } else {
                unset($diary);
            }

        }
        
        return redirect('user/home');
    }
    
    public function delete(Request $request)
    {
        $selected_date = $request->selectedDate;
        $diary_id = Day::where('date', $selected_date)->value('diary_id');
        $diary = Diary::find($diary_id);
        
        if($diary) {
            $diary->delete();
        }

        // dd($diary);
        
        return redirect('user/home');
    }
}
