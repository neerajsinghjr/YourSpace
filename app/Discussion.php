<?php

namespace App;

use Auth;
use Session;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    
	protected $fillable = ['user_id', 'channel_id', 'slug', 'title', 'content'];

	public function channel() {

		return $this->belongsTo('App\Channel');
		
	}

	public function user() {

		return $this->belongsTo('App\User');

	}

	public function replies() {

		return $this->hasMany('App\Reply');

	}

	public function watchers() {

		return $this->hasMany('App\Watcher');

	}

	public function checkPostOwnership($discussion_id) {

		$user_id = Auth::id();

		$status = $this->where([
			['id', $discussion_id],
			['user_id', $user_id],
		])->first();


		/* 
		*	Count():-- Use only when you sure that it query will return something.
		*	Otherwise prefer the method below
		*/
		if($status) {

			return true;

		}else  {

			return false;

		}
		
	}

	public function isUserWatching($discussion_id) {

		$status = $this->watchers()->where([
			['user_id', Auth::id()],
			['discussion_id', $discussion_id]
		])->first();

		if($status) {

			return true;
			
		}else  {

			return false;

		}


	}
	

}	
