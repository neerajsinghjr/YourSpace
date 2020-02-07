<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* <///////////////////////////////////////// FrontEnd Routes ///////////////////////////////////////////>*/

Route::get('/', function () {
    return view('index');
});


/*<---------------------------------- Home Controller ------------------------------>*/

Route::get('/{provider}/signup', 'SocialAuthController@auth')->name('social.auth');

Route::get('/{provider}/redirect', 'SocialAuthController@authCallback')->name('social.callback');


/* </////////////////////////////////////////// BackEnd Routes /////////////////////////////////////////>*/

Auth::routes();

Route::middleware('auth')->group(function() {

	/*<---------------------------------- Channel Controller ------------------------------>*/

	Route::resource('/channels', 'ChannelController');


	/*<---------------------------------- Discussion Controller ------------------------------>*/

	Route::get('/discussion/recently/created', 'DiscussionController@index')->name('home');

	Route::get('/discussion/create', 'DiscussionController@create')->name('discussion.create');

	Route::post('/discussion/store', 'DiscussionController@store')->name('discussion.store');

	Route::get('/discussion/edit/{slug}', 'DiscussionController@edit')->name('discussion.edit');

	Route::post('/discussion/edit/{slug}/update', 'DiscussionController@update')->name('discussion.update');

	Route::get('/discussion/show/{slug}', 'DiscussionController@show')->name('discussions.show');

	Route::get('/discussion/destroy/{slug}', 'DiscussionController@destroy')->name('discussion.destroy');

	Route::get('/discussion/add/watch/{id}', 'DiscussionController@addWatcher')->name('discussion.addWatcher');

	Route::get('/discussion/remove/watch/{id}', 'DiscussionController@removeWatcher')->name('discussion.removeWatcher');

	Route::post('/discussion/reply/{discussion_id}/store', 'DiscussionController@storeReply')->name('reply.store');

	Route::get('/discussion/reply/like/{id}', 'DiscussionController@likeReply')->name('reply.like');

	Route::get('/discussion/reply/unlike/{id}', 'DiscussionController@unlikeReply')->name('reply.unlike');

	Route::get('/discussion/reply/claim-as-best-reply/{id}', 'DiscussionController@bestReply')->name('reply.best');

	Route::get('/discussion/reply/edit/{id}', 'DiscussionController@destroyReply')->name('reply.delete');

	Route::get('/discussion/reply/{id}/{slug}', 'DiscussionController@storeReplyBack')->name('reply.back');


});