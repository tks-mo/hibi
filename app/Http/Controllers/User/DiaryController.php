<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
    public function diary(Request $request)
    {
        
        return view('user.diary');
    }
    
    public function edit(Request $request)
    {
        return view('user.edit');
    }
    
    public function create(Request $request)
    {
        return redirect('user/diary');
    }
    
}
