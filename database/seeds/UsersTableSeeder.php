<?php
/**
* Documentar
*/
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        #create basic admin user
        $faker=Faker::create();
        User::create([
            'first_name' => 'root',
            'last_name'  => 'root',
            'email'=>'root@root.com',
            'role'=>'root',
            'password'=>\Hash::make('root'),
            'status' => 'active'
        ]);

        User::create([
            'first_name' => 'admin',
            'last_name'  => 'admin',
            'email'=>'admin@admin.com',
            'role'=>'administrador',
            'password'=>\Hash::make('admin'),
            'status' => 'active'
        ]);

        User::create([
            'first_name' => 'client',
            'last_name'  => 'client',
            'email'=>'client@client.com',
            'role'=>'client',
            'password'=>\Hash::make('client'),
            'status' => 'active'
        ]);

        User::create([
            'first_name' => 'support',
            'last_name'  => 'support',
            'email'=>'support@support.com',
            'role'=>'support',
            'password'=>\Hash::make('support'),
            'status' => 'active'
        ]);
    }
}
