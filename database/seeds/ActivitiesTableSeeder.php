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
            ['People & Events QA', \Carbon\Carbon::createFromDate(2018,04,26), \Carbon\Carbon::createFromDate(2018,04,27)],
            ['Article QA', \Carbon\Carbon::createFromDate(2018,04,29), \Carbon\Carbon::createFromDate(2018,04,30)]
        ];

        $count = count($activities);

        foreach ($activities as $key => $activityData) {
            $activity = new Activity();

            $activity->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $activity->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $activity->name = $activityData[0];
            $activity->date_from = $activityData[1];
            $activity->date_to = $activityData[2];

            $activity->save();
            $count--;
        }
    }
}
