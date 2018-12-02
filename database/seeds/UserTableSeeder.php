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
        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'user_name' => $faker->name,
                'user_email' => $faker->email,
                'user_password' => str_random(3),
                'user_role' => mt_rand(1,2),
                'user_gender' => mt_rand(1,2),
                'user_picture' => str_random(10)
            ]);
        // DB::table('users')->insert([
        // 	'user_name' => str_random(10),
        // 	'user_email' => str_random(10).'@gmail.com',
        // 	'user_password' =>bycript($data['password']),
        // ]);
	    }
	}
}