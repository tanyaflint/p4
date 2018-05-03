<?php

use Illuminate\Database\Seeder;
use App\Activity;
use App\Teammate;

class ActivityTeammateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the activity names we want to associate teammates with
        # The *key* will be the activity name, and the *value* will be an array of teammates.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
        $activities =[
            'People & Events QA' => ['Tanya Flint', 'Sylvia Plath'],
            'Article QA' => ['Tanya Flint', 'Sylvia Plath', 'J.K. Rowling']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($activities as $activityName => $teammates) {

            # First get the book
            $activity = Activity::where('name', 'like', $activityName)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($teammates as $teammateName) {
                $teammate = Teammate::where('name', 'LIKE', $teammateName)->first();

                # Connect this tag to this book
                $activity->teammates()->save($teammate);
            }
        }
    }
}
