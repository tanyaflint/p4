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

    ##
    ## Helper methods for listing current activities (today's activities)
    ## Keeping them in one place in case current activity logic changes 'created_at', '>=', \Carbon\Carbon::today()
    ##

    public static function getCurrentActivities()
    {
        $activity = Activity::where('created_at', '>=', \Carbon\Carbon::today())->get();

        foreach($activity as $thisActivity) {
            # Create a "display friendly" version of the date_from and date_to date to be used in the view
            $thisActivity->date_from_display = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thisActivity->date_from)->format('l, m/d/Y H:i');
            $thisActivity->date_to_display = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thisActivity->date_to)->format('l, m/d/Y H:i');
        }
        return $activity;
    }

    public static function getTeamWithCurrentActivities()
    {
        //Get all teammates who have linked activities and the activity created date is today
        $team = Teammate::whereHas('activities', function ($query) {
            $query->where('activities.created_at', '>=', \Carbon\Carbon::today());
        })->get();
        return $team;
    }
}
