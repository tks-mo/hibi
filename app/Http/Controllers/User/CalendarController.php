<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Facades\Calendar;
use App\Calendars\CalendarService;

class CalendarController extends Controller
{
    private $service;
    
    public function __construct(CalendarService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return view('user.home', [
            // 'weeks' => $this->service->getWeeks(),
            'weeks' => Calendar::getWeeks(),
            'month' => Calendar::getMonth(),
            'prev' => Calendar::getPrev(),
            'next' => Calendar::getNext(),
        ]);
    }
}
