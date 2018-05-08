<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teammate;

class Activity extends Model
{
    public function teammates()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Teammate')->withTimestamps();
    }

    ## Helper methods for listing current activities (today's activities) wanted to keep them in one place in case current activity logic changes 'created_at', '>=', \Carbon\Carbon::today()

    public static function getCurrentActivities()
    {
        $activity = Activity::where('created_at', '>=', \Carbon\Carbon::today())->get();
        return $activity;
    }

    public static function getTeamWithCurrentActivities()
    {
        //Get all teammates who have linked activities and the activity create date is today
        //TODO: is this correct?
        $team = Teammate::whereHas('activities', function ($query) {
            $query->where('activities.created_at', '>=', \Carbon\Carbon::today());
        })->get();
        return $team;
    }

    //TODO: Not used, do I need to remove this
    public static function getCurrentActivitiesWithTeam()
    {
        $activity = Activity::with('teammates')->where('created_at', '>=', \Carbon\Carbon::today())->get();
        return $activity;
    }
}
