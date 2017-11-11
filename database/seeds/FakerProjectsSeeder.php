<?php

use Illuminate\Database\Seeder;

class FakerProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $userIds = \App\Client::all()->pluck('id')->toArray();
        $companiesIds = \App\Companies::all()->pluck('id')->toArray();
        $dealsIds = \App\Deals::all()->pluck('id')->toArray();
        $rowRand = rand(30,100);

        for ($i = 0; $i<$rowRand; $i++) {
            $projects = [
                'name' => $faker->name,
                'client_id' => $faker->randomElement($userIds),
                'companies_id' => $faker->randomElement($companiesIds),
                'deals_id' => $faker->randomElement($dealsIds),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ];

            DB::table('projects')->insert($projects);
        }
    }
}
