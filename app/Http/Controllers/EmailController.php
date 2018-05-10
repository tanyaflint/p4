<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use App\Teammate;

class EmailController extends Controller
{
    public function index()
    {
        $team = Activity::getTeamWithCurrentActivities();
        return view('schedule.temp_email_display')->with([
            'team' => $team
        ]);
    }

}
