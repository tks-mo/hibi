<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Day;
use App\Diary;
use App\Schedule;

class DiaryController extends Controller
{
    public function show(Request $request)
    {
        $selectedDate = $request->selectedDate;
        $Ymd = date('Y年m月d日',strtotime($selectedDate));
        
        $id = Day::where('day_date', $selectedDate)->value('diary_id');
        $diary = Diary::find($id);
        
        return view('user.diary', ['selectedDate' => $selectedDate, 'Ymd' => $Ymd, 'diary' => $diary]);
    }
    
    public function edit(Request $request)
    {
        $selectedDate = $request->selectedDate;
        $Ymd = date('Y年m月d日',strtotime($selectedDate));
        
        $id = Day::where('day_date', $selectedDate)->value('diary_id');
        $diary = Diary::find($id);

        return view('user.edit', ['selectedDate' => $selectedDate,  'Ymd' => $Ymd, 'diary' => $diary]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Diary::$rules);
        
        $selectedDate = $request->selectedDate;
        $id = Day::where('day_date', $selectedDate)->value('diary_id');
        $diary = Diary::find($id);
        
        if (empty($diary)){
            
            $diary = new Diary;
            
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/image');
                $diary->fill(['image_path' => basename($path)]);
            } else {
                $diary->image_path = null;
            }
            
            $diary->fill(['diary_text' => $request->diary_text]);
            $diary->save();
            
            $day = Day:: firstOrCreate(['day_date' => $selectedDate]);
            $day->diary_id = $diary->id;
            $day->save();
            
        } else {
            
            if ($request->image_remove == 'true') {
                $diary->image_path = null;
            } elseif ($request->file('image')) {
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
        return redirect('user/home');
    }
}
