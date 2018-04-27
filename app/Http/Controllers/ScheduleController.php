<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.editions');
    }

    public function select()
    {
        return view('schedule.single_edition');
    }

    public function team()
    {
        return view('team.editor');
    }
}
