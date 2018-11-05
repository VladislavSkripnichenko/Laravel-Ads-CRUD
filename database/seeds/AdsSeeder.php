<?php

use App\Ad;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 80; $i++) {
            $ad = Ad::create([
                'title' => $faker->word,
                'description' => $faker->paragraph,
                'user_id' => rand(1, 10),
            ]);
            $ad->save();
        }
    }
}
