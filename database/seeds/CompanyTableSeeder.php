<?php

use App\Company;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Company::create([

                'name'                => 'AntVel',
                'website_name'        => 'AntVel eCommerse',
                'slogan'              => 'An eCommerce out of the box',
                'logo'                => '/img/pt-default/'.$faker->unique()->numberBetween(1, 330).'.jpg',
                'phone_number'        => $faker->phoneNumber,
                'cell_phone'          => $faker->phoneNumber,
                'address'             => $faker->streetAddress,
                'state'               => $faker->state,
                'city'                => $faker->city,
                'zip_code'            => $faker->postcode,
                'facebook'            => 'AntVel',
                'facebook_app_id'     => $faker->md5,
                'twitter'             => 'AntVel',
                'contact_email'       => 'contact@antvel.com',
                'sales_email'         => 'sales@antvel.com',
                'support_email'       => 'support@antvel.com',
                'website'             => 'http://antvel.com',
                'description'         => $faker->text(200),
                'keywords'            => implode(',', $faker->words(20)),
                'about_us'            => $faker->text(1200),
                'refund_policy'       => trans('law.refund'),
                'privacy_policy'      => trans('law.privacy'),
                'terms_of_service'    => trans('law.terms'),
                'google_maps_key_api' => 'AIzaSyCutQnEgrqX8W2X-nBCYB7-CbsTC-LlRMw',

            ]);
    }
}
