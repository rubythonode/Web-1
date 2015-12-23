<?php
/**
* Documentar.
*/
use App\Log;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::get();
        #Category
        foreach (range(1, 20) as $void) {
            Log::create([
                'user_id'   => $users->random(1)->id,
                'type'      => $faker->text(10),
                'source_id' => $faker->numberBetween(50, 1000000),
                'details'   => $faker->text(50),
            ]);
        }
    }
}
