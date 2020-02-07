<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $users = [

            [
                'name' => 'Devil',
                'email' => 'devil@blog.com',
                'avatar' => 'img/avatar/devil.jpg',
                'admin' => 1,
                'password' => bcrypt('devil'),
                'created_at' => '2019-09-19 16:39:40',
            ], [
                'name' => 'Junior',
                'email' => 'junior@blog.com',
                'avatar' => 'img/avatar/junior.jpg',
                'admin' => 1,
                'password' => bcrypt('junior'),
                'created_at' => '2019-09-20 16:39:40',
            ], [
                'name' => 'Anna',
                'email' => 'anna@blog.com',
                'avatar' => 'img/avatar/avatar.png',
                'admin' => 1,
                'password' => bcrypt('anna'),
                'created_at' => '2019-09-21 16:39:40',
            ], [
                'name' => 'Jihyo',
                'email' => 'jihyo@blog.com',
                'avatar' => 'img/avatar/jihyo.jpg',
                'admin' => 1,
                'password' => bcrypt('jihyo'),
                'created_at' => '2019-09-22 16:39:40',
            ], [
                'name' => 'Sana',
                'email' => 'sana@blog.com',
                'avatar' => 'img/avatar/avatar.png',
                'admin' => 0,
                'password' => bcrypt('sana'),
                'created_at' => '2019-09-23 16:39:40',
            ], [
                'name' => 'Momo',
                'email' => 'momo@blog.com',
                'avatar' => 'img/avatar/avatar.png',
                'admin' => 0,
                'password' => bcrypt('momo'),
                'created_at' => '2019-09-24 16:39:40',
            ], [
                'name' => 'Robert',
                'email' => 'robert@blog.com',
                'avatar' => 'img/avatar/deathnote.jpg',
                'admin' => 0,
                'password' => bcrypt('robert'),
                'created_at' => '2019-09-25 16:39:40',
            ]

        ];

        User::insert($users);

    }

}
