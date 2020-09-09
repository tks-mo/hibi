<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Calendars\CalendarService;

class Calendar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CalendarService::class;
    }
}
