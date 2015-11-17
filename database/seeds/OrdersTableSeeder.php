<?php
/**
* Documentar
*/
use App\Order;
use App\OrderDetail;
use App\User;
use App\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker=Faker::create();
        $users=User::get();
        $products=Product::get();

        for ($i=0;$i<10;$i++) {

            $user  = $users->random(1);
            $status= $faker->randomElement(['open', 'paid', 'pending', 'installed', 'cancelled']);

            $order=Order::create([
                'user_id' =>$user->id,
                'status'  =>$status,
                'end_date'=>$status=='installed'||$status=='cancelled'?$faker->dateTime():null
            ]);

            $random=$faker->numberBetween(1, 2);
            for ($y=0;$y<$random;$y++) {

                $product=$products->random(1);
                OrderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>$product->id,
                    'price'=>$product->price,
                    'quantity'=>1
                ]);

            }

        }
    }
}
