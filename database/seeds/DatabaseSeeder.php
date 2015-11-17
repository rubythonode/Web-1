<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call('CompanyTableSeeder');
         $this->call('UsersTableSeeder');
         $this->call('LogsTableSeeder');
         $this->call('NoticesTableSeeder');
         $this->call('ProductsTableSeeder');
         $this->call('OrdersTableSeeder');

        Model::reguard();
    }
}
