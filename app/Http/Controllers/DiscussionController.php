<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Notification;

use App\Like;
use App\User;
use App\Reply;
use App\Channel;
use App\Watcher;
use App\Discussion;
use Illuminate\Http\Request;
use App\Notifications\ReplyNotification;

class DiscussionController extends Controller
{


    public function __construct() {

        $this->middleware('auth');
        
    }

    public function index() {

        $discussions = Discussion::orderBy('id', 'desc')->paginate(3);

        if($discussions->count() > 0) {

            return view('discussions.index', [
                'discussions' => $discussions,
            ]); 

        }else {

            return view('error', [
                'error' => "Oops, Something unexpected occured!",
            ]); 

        }

    }

    public function create() {

        return view('discussions.create');

    }

    public function store(Request $request) {

        // dd($request->all());

        // validating request;
        $this->validate($request, [
            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required',
        ]);

        // mass assigning;
        $discussion = Discussion::create([
            'user_id' => Auth::id(),
            'channel_id' => $request->channel_id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
        ]);


        if($discussion->save()) {

            Session::flash('success', 'Discussion has been created Successfully');
            return redirect()->route('home');

        }else {

            return view('errors.error', [
                ['message' => "Something happened, We couldn't save your request."]
            ]);

        }


    }

    public function edit($slug) {

        $discussion = Discussion::where('slug', $slug)->first();

        if($discussion) {

            return view('discussions.edit', [
                'discussion' => $discussion,
            ]);

        }else {

            return view('errors.error', [
                'message' => "We couldnt load the view at this time.",
            ]);


        }

    }

    public function update(Request $request, $slug) {

        $this->validate($request, [
            'content' => 'required',
        ]);

        // updating to discussions;
        $discussion = Discussion::where('slug', $slug)->first();
        $discussion->content = $request->content;

        if ($discussion->save()) {

            Session::flash('success', 'Your discussion updated Successfully');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => "Sorry for Incovenience,but we couldn't update it right now",
            ]);

        }

    }

    public function show($slug) {

    	$discussion = Discussion::where('slug', $slug)->first();
    	
    	// fallback check
    	if ($discussion) {
    		
    		return view('discussions.show', [

    			'discussion' => $discussion,

    		]); 

    	}else {

    		return view('errors.error', [
                
    			'error' => "Oops ! Something happened. <br> We Are Sorry for Incovenience",

    		]);

    	}
        
    }

    public function destroy($slug) {

        $discussion = Discussion::where('slug', $slug)->firstOrFail();


        if($discussion->delete()) {

            Session::flash('success', 'You discussion deleted Successfully');
            return redirect()->route('home');

        }else {

            return view('errors.error', "Sorry, we couldn't trailed out the post");

        }

    }


    public function addWatcher($discussion_id) {

        $watcher = new Watcher();
        $watcher->user_id = Auth::id();
        $watcher->discussion_id = $discussion_id;

        if($watcher->save()) { 

            Session::flash('success', 'You are now watching this discussion');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => "Something went uncaught, Don't worry i am behind",
            ]);

        }

    }

    public function removeWatcher($discussion_id) {

        $watcher = Watcher::where([
            ['user_id', Auth::id()],
            ['discussion_id', $discussion_id],
        ])->first();

        if($watcher->delete()){ 

            Session::flash('danger', 'You are no longer watching the discussion');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => "Something went uncaught, Don't worry i am behind",
            ]);

        }

    }

    public function destroyReply($reply_id) {

        if(Reply::find($reply_id)->delete()) {

            Session::flash('success', 'Your reply deleted successfully');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => 'Sorry, We cant process your request right now',
            ]);

        }

    }

    public function storeReply(Request $request, $discussion_id) {
        
        $reply = new Reply();

        $this->validate($request, [
            'content' => 'required',
        ]);

        // saving reply;
        $reply->user_id = Auth::id();
        $reply->discussion_id = $discussion_id;
        $reply->user->points += 25;
        $reply->content = $request->content;
        
        // notify watchers;
        $watcherList = array();

        /*  
            #Task: To crawl the Watcher User for new Reply alert
        *   #Status: Failure
        *   #Description: whenever these is a new reply, you can't apply the MODEL relationship to crawl
        *   respective watcher table, because it will null there.  
        *   #Code: 
        *       foreach($reply->user->watchers as $watcher) {
        *           if($watcher->discussion_id == $discussion_id) {
        *               array_push($watcherList, $watcher->user_id);
        *            }
        *       }    
        */ 
        
        foreach(Watcher::all() as $watcher) {
            
            if($watcher->discussion_id == $discussion_id) {
                
                array_push($watcherList, User::find($watcher->user_id));

            }

        }

        Notification::send($watcherList, new ReplyNotification());


        if($reply->save() && $reply->user->save()) {

            Session::flash('success', 'Your reply has been posted successfully.');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => 'Something happened while saving your reply.',
            ]);
    
        }

    }

    public function likeReply($reply_id) {

        $like = new like();
        $like->user_id = Auth::id();
        $like->reply_id = $reply_id;

        if($like->save()) {

            Session::flash('success', 'You like the reply');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => 'Something unexpected happened while processing it.',
            ]);

        }

    }

    public function unlikeReply($reply_id) {

        $unlike = Like::where([
            ['user_id', Auth::id()],
            ['reply_id', $reply_id],
        ])->first();

        if($unlike->delete()) {

            Session::flash('success', 'You unlike the reply');
            return redirect()->back();

        }else {

            return view('errors.error', [
                'message' => 'Something unexpected happened while processing it.',
            ]);

        }
        
    }
    
    public function bestReply($reply_id) {

        $reply = Reply::find($reply_id);
        $reply->best_reply = 1;
        $reply->discussion->status = 1;

        if($reply->save() && $reply->discussion->save()) {

            Session::flash('success', 'Reply has been marked as BEST. Discussion has been also set to be closed');
            return redirect()->route('home');

        }else  {

            return view('errors.error', [
                'message' => 'Something happened while marking your best Reply',
            ]);

        }

    }

}

