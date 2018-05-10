<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $activities = [
            ['People & Events QA', \Carbon\Carbon::now(), \Carbon\Carbon::now()->addDays(1)],
            ['Article QA', \Carbon\Carbon::now()->addDays(7), \Carbon\Carbon::now()->addDays(8)]
        ];

        foreach ($activities as $key => $activityData) {
            $activity = new Activity();

            $activity->created_at = Carbon\Carbon::now();
            $activity->updated_at = Carbon\Carbon::now();
            $activity->name = $activityData[0];
            $activity->date_from = $activityData[1];
            $activity->date_to = $activityData[2];

            $activity->save();
        }
    }
}
