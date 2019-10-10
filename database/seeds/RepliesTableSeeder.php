<?php


use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replies = [

        	[
        		'user_id' => 4,
        		'discussion_id' => 1,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 2,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-02 16:39:40',
        	], [
        		'user_id' => 3,
        		'discussion_id' => 3,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 4,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 5,
        		'discussion_id' => 5,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 6,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 7,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 1,
        		'discussion_id' => 1,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 3,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 3,
        		'discussion_id' => 2,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 4,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 5,
        		'discussion_id' => 5,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 6,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	], [
        		'user_id' => 4,
        		'discussion_id' => 7,
                'best_reply' => 0,
        		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In mollis nunc sed id semper risus in hendrerit. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis.',
        		'created_at' => '2019-08-01 16:39:40',
        	],

        ];

        Reply::insert($replies);
    }
}
