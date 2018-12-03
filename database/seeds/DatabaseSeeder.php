<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            CartTableSeeder::class,
            CategoryTableSeeder::class,
            UserTableSeeder::class,
            PostTableSeeder::class,
            TransactionTableSeeder::class,
            CommentTableSeeder::class,
        ]);
        
    }
}
