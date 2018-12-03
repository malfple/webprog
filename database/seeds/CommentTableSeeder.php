<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'content' => 'This post is sick bro',
            'user_id' => 2,
            'post_id' => 1,
        ]);
        DB::table('comments')->insert([
            'content' => 'yea bro',
            'user_id' => 1,
            'post_id' => 1,
        ]);
    }
}
