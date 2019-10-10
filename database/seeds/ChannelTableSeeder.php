<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $channels = [

        	[
                'title' => 'Angular',
                'slug' => 'angular',
                'created_at' => '2019-09-21 16:39:40',
            ], [
                'title' => 'CakePHP',
                'slug' => 'cake-php',
                'created_at' => '2019-09-22 16:39:40',
            ], [
                'title' => 'Laravel',
                'slug' => 'laravel',
                'created_at' => '2019-09-23 16:39:40',
            ], [
                'title' => 'NodeJS',
                'slug' => 'node-js',
                'created_at' => '2019-09-24 16:39:40',
            ], [
                'title' => 'Symfony',
                'slug' => 'symfony',
                'created_at' => '2019-09-25 16:39:40',
            ], [
                'title' => 'React',
                'slug' => 'react',
                'created_at' => '2019-09-26 16:39:40',
            ], [
                'title' => 'Vue Js',
                'slug' => 'vue-js',
                'created_at' => '2019-09-27 16:39:40',

            ], [
                'title' => 'Bootstrap',
                'slug' => 'bootstrap',
                'created_at' => '2019-09-27 16:39:50',

            ],
          
        ];


        /* METHOD 1: SEEDING MULTI-DIMENTIONSAL DATA TO DATABASE USING CREATE E.M*/
        // foreach($channels as $channel) { 
        // 	Channel::insert($channels);
        // }

         /* METHOD 2: SEEDING MULTI-DIMENTIONSAL DATA TO DATABASE USING INSERT E.M */
        Channel::insert($channels);

         /* METHOD 3: SEEDING MULTI-DIMENTIONSAL DATA TO DATABASE USING INSERT OF Q.B */
		// DB::table('channels')->insert($channels);

    }
}

