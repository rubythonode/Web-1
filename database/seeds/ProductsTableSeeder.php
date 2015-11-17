<?php
/**
* Documentar
*/
use App\Product as Product;
use App\ProductOffer as ProductOffer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker=Faker::create();
        
        #Plans store
        for ($i=0;$i<3;$i++) {
            $price=$faker->numberBetween(1, 99);
            $stock=$faker->numberBetween(20, 50);
            $id=Product::create([
                'type'=>'store',
                'name'=>$faker->unique()->catchPhrase,
                'description'=>$faker->text(500),
                'price'=>$price, 
                'stock'=>$stock,
                //'stripe_plan' => ,
                'low_stock'=>$faker->randomElement([5, 10, 15]),

            ]);
            if ($faker->numberBetween(0, 1)) {
                $percentage=$faker->randomElement([10, 15, 25, 35, 50]);
                ProductOffer::create([
                    'product_id'=>$id->id,
                    'day_start'=>$faker->dateTime(),
                    'day_end'=>$faker->dateTimeBetween('now', '+1 years'),
                    'percentage'=>$percentage,
                    'price'=>(($percentage*$price)/100),
                    'quantity'=>round($stock/2)
                ]);
            }
        }

        #modules
        for ($i=0;$i<15;$i++) {
            $price=$faker->numberBetween(1, 99);
            $stock=$faker->numberBetween(20, 50);
            $id=Product::create([
                'type'=>'module',
                'name'=>$faker->unique()->catchPhrase,
                'description'=>$faker->text(500),
                'price'=>$price, 
                'stock'=>$stock,
                //'stripe_plan' => ,
                'low_stock'=>$faker->randomElement([5, 10, 15]),

            ]);
            if ($faker->numberBetween(0, 1)) {
                $percentage=$faker->randomElement([10, 15, 25, 35, 50]);
                ProductOffer::create([
                    'product_id'=>$id->id,
                    'day_start'=>$faker->dateTime(),
                    'day_end'=>$faker->dateTimeBetween('now', '+1 years'),
                    'percentage'=>$percentage,
                    'price'=>(($percentage*$price)/100),
                    'quantity'=>round($stock/2)
                ]);
            }
        }

        #development
        for ($i=0;$i<5;$i++) {
            $price=$faker->numberBetween(1, 99);
            $stock=$faker->numberBetween(20, 50);
            $id=Product::create([
                'type'=>'development',
                'name'=>$faker->unique()->catchPhrase,
                'description'=>$faker->text(500),
                'price'=>$price, 
                'stock'=>$stock,
                //'stripe_plan' => ,
                'low_stock'=>$faker->randomElement([5, 10, 15]),

            ]);
            if ($faker->numberBetween(0, 1)) {
                $percentage=$faker->randomElement([10, 15, 25, 35, 50]);
                ProductOffer::create([
                    'product_id'=>$id->id,
                    'day_start'=>$faker->dateTime(),
                    'day_end'=>$faker->dateTimeBetween('now', '+1 years'),
                    'percentage'=>$percentage,
                    'price'=>(($percentage*$price)/100),
                    'quantity'=>round($stock/2)
                ]);
            }
        }
    }
}
