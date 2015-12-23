<?php
/**
* Documentar.
*/
use App\Notice;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = (User::get()->toArray());
        foreach ($users as $user) { //dd($user);
            foreach (range(1, 10) as $void) {
                $sender_id = $user['id'];
                while ($sender_id == $user['id']) {
                    $sender_id = $faker->randomElement($users)['id'];
                }

                Notice::create([
                    'user_id'   => $user['id'],
                    'sender_id' => $sender_id,
                    'source_id' => $faker->numberBetween(50, 1000000),
                    'title'     => $faker->text(50),
                    'message'   => $faker->text(150),
                    'status'    => $faker->randomElement(['read', 'unread', 'new']),
                    'type'      => $faker->randomElement(['info', 'danger', 'warning', 'success']),
                ]);
            }
        }
    }
}
