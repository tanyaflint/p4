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

    public static function createEvent()
    {
        $vCalendar = new \Eluceo\iCal\Component\Calendar('www.p4.idreamcode.me');
        $vEvent = new \Eluceo\iCal\Component\Event();

        $vEvent
            ->setDtStart(new \DateTime('2018-05-03'))
            ->setDtEnd(new \DateTime('2018-05-03'))
            ->setNoTime(true)
            ->setSummary('People and Events')
        ;

        $vCalendar->addComponent($vEvent);
        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="cal.ics"');

        dump($vCalendar->render());
    }
}
