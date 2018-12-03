<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$faker = Faker::create();
		    foreach (range(1,25) as $index) {
		        DB::table('posts')->insert([
		            'post_name' => $faker->name,
		            'post_caption' => $faker->name,
		            'post_price' => mt_rand(100,500),
		            'post_picture' => '2fn0m5.jpg',
                    'user_id' => 1,
                    'category_id' => 1,
		        ]);
   		}
        DB::table('posts')->insert([
            'post_name' => $faker->name,
            'post_caption' => $faker->name,
            'post_price' => mt_rand(100,500),
            'post_picture' => '2fn0m5.jpg',
            'user_id' => 2,
            'category_id' => 2,
        ]);
	}
}