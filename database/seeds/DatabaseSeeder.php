<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeammatesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(ActivityTeammateTableSeeder::class);
    }
}
