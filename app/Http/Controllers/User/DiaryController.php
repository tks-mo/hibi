<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
    public function diary_show(Request $request)
    {
        
        return view('user.diary');
    }
    
    public function edit_show(Request $request)
    {
        return view('user.edit');
    }
    
    public function diary_create(Request $request)
    {
        return redirect('user/diary');
    }
    
}
