<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function schedule_create(Request $request)
    {
        return redirect('user/edit');
    }
    
}
