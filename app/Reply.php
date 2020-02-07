<?php

namespace App;

use Auth;
use App\Like;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    

    protected $fillable = ['user_id', 'discussion_id', 'content'];

    public function discussion() {

    	return $this->belongsTo('App\Discussion');

    }

    public function user() {

		return $this->belongsTo('App\User');

    }

    public function likes() {

    	return $this->hasMany('App\Like');

    }


    public function replybacks() {

        return $this->hasMany('App\ReplyBack');

    }

    public function isLiked($reply_id) {

        $liked = Like::where([
            ['user_id', Auth::id()],
            ['reply_id', $reply_id],
        ])->first();

        if($liked) {

            return true;

        }else  {

            return false;

        }

   }


}
