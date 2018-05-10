<?php

use Illuminate\Database\Seeder;
use App\Teammate;


class TeammatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teammates = [
            ['Tanya Flint', 'tflint@hbs.edu'],
            ['Sylvia Plath', 'splath@email.com'],
            ['J.K. Rowling', 'jrowling@email.com']
        ];

        foreach ($teammates as $key => $teammateData) {
            $teammate = new Teammate();

            $teammate->created_at = Carbon\Carbon::now();
            $teammate->updated_at = Carbon\Carbon::now();
            $teammate->name = $teammateData[0];
            $teammate->email = $teammateData[1];

            $teammate->save();
        }
    }
}