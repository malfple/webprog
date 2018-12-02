<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
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
        // foreach (range(1,10) as $index) {
        //     DB::table('users')->insert([
        //         'user_name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => str_random(3),
        //         'user_role' => mt_rand(1,2),
        //         'user_gender' => mt_rand(1,2),
        //         'user_picture' => str_random(10)
        //     ]);
        // }
        DB::table('users')->insert([
        	'user_name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' =>'admin',
        	'user_role' => 'Admin',
        	'user_gender' => 'Male',
        	'user_picture' => '2fn0m5.jpg'
        ]);
	    
	}
}
