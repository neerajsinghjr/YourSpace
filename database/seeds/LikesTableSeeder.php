<?php

use App\Like;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [
        	[
        		'user_id' => 1,
        		'reply_id' => 1,
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 2,
        		'reply_id' => 2,
        		'created_at' => '2019-08-20 16:39:40',
        	], [
        		'user_id' => 3,
        		'reply_id' => 3,
        		'created_at' => '2019-08-20 16:39:40',
        	], [
        		'user_id' => 4,
        		'reply_id' => 4,
        		'created_at' => '2019-08-20 16:39:40',
        	], [
        		'user_id' => 5,
        		'reply_id' => 5,
        		'created_at' => '2019-08-20 16:39:40',
        	], [
        		'user_id' => 6,
        		'reply_id' => 6,
        		'created_at' => '2019-08-20 16:39:40',
        	], [
        		'user_id' => 7,
        		'reply_id' => 7,
        		'created_at' => '2019-08-20 16:39:40',
        	],
        ];

        Like::insert($likes);

    }
}
