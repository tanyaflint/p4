<?php

use Illuminate\Database\Seeder;
use App\Invite;

class InvitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invites = [
            [1 , 1],
            [1 , 2],
            [2 , 1],
            [2 , 2],
            [3 , 1],
            [3 , 2]
        ];

        $count = count($invites);

        foreach ($invites as $key => $inviteData) {
            $invite = new Invite();

            $invite->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $invite->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $invite->team_id = $inviteData[0];
            $invite->activity_id = $inviteData[1];

            $invite->save();
            $count--;
        }
    }
}
