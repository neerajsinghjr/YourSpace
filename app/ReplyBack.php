<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyBack extends Model
{
    
    protected $fillable = ['user_id', 'reply_id', 'like', 'dislike', 'content'];

    public function reply() {

    	return $this->belongsTo('App\Reply');
    	
    }
}
