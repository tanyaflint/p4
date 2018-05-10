<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Teammate;

class ActivityController extends Controller
{
    /**
     * Show current activities and the form to create a new activity
     * GET /
     */
    public function index()
    {
        $activity = Activity::getCurrentActivities();
        return view('schedule.activity')->with([
            'activity' => $activity,
            'newActivity' => new Activity()
        ]);
    }

    /**
     * Process the form to create a new activity and attach it to each member of the team
     * POST /activity/create
     */
    public function create(Request $request)
    {
        # Custom validation messages
        $messages = [
            'start.date_format' => 'Start date does no match the following format mm/dd/yyyy hh:mm.',
            'start.required' => 'The start date field is required.',
            'end.date_format' => 'End date does no match the following format mm/dd/yyyy hh:mm.',
            'end.required' => 'The end date field is required.'
        ];

        $this->validate($request, [
            'activityName' => 'required',
            'start' => 'required|date_format:m/d/Y H:i',
            'end' => 'required|date_format:m/d/Y H:i'
        ], $messages);

        $activity = new Activity();
        $activity->name = $request->activityName;
        $activity->date_from = \Carbon\Carbon::createFromFormat('m/d/Y H:i', $request->start);
        $activity->date_to = \Carbon\Carbon::createFromFormat('m/d/Y H:i', $request->end);
        $activity->save();

        $team = Teammate::all();
        foreach ($team as $teammate) {
            $activity->teammates()->attach($teammate->id);
        }

        return redirect('/')->with('alert', 'Activity was created');
    }

    //TODO Finsh calendar sends
    public function select()
    {
        $activities = Activity::getCurrentActivities();

        $times = array();
        $activityNames = array();

        foreach ($activities as $thisActivity)
        {
            for ($i = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thisActivity->date_from); $i < \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thisActivity->date_to); $i = $i->addHour())
            {
                if ($i->hour == 17)
                {
                    #Skip non business hours
                    $i->addHours(16);
                }
                array_push($times, $i->toDayDateTimeString());
            }
            $activityNames[$thisActivity->name] = $times;
        }
        return view('schedule.activity_select')->with([
            'activities' => $activities,
            'times' => $times,
            'activityNames' => $activityNames
        ]);
    }

    #Calendar send package
    public static function createEvent()
    {
        $vCalendar = new \Eluceo\iCal\Component\Calendar('www.p4.idreamcode.me');
        $vEvent = new \Eluceo\iCal\Component\Event();

        $vEvent
            ->setDtStart(new \DateTime('2018-05-03'))
            ->setDtEnd(new \DateTime('2018-05-03'))
            ->setNoTime(true)
            ->setSummary('People and Events');

        $vCalendar->addComponent($vEvent);
        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="cal.ics"');

        dump($vCalendar->render());
    }
}
