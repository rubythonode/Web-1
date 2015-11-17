<?php
/**
* Documentar
*/
use App\ProductAttribute as ProductAttribute;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductAttributeTableSeeder extends Seeder
{
    public function run()
    {
        $faker=Faker::create();

        for ($i=0;$i<3;$i++) {
            $price=$faker->numberBetween(1, 99);
            $stock=$faker->numberBetween(20, 50);
            ProductAttribute::create([
                'type'=>'store',
                'name'=>$faker->unique()->catchPhrase,
                'description'=>$faker->text(500),
                'status' => 'active'

            ]);
        }

    }
}
