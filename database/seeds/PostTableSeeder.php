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
		    foreach (range(1,10) as $index) {
		        DB::table('posts')->insert([
		            'post_name' => $faker->name,
		            'post_caption' => $faker->name,
		            'post_price' => mt_rand(100,500),
		            'post_picture' => str_random(10)
		        ]);
   		}
	}
}