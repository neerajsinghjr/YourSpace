@extends('layouts.app')

@section('content')
    
    <!-- main-card-wrapper -->
    <div class="card">
        <div class="card-header">
            <p class="h4 font-weight-bold">
                Q: <span class="h4 font-weight-bold text-danger">{{ str_limit($discussion->title, 50) }}</span>
            </p>
        </div>

        <div class="card-body">   
            <div class="container remove-padding">
                <!-- Discussion-box-->
                <div class="discussion-box">
                    <div class="mb-3 card">
                        <div class="card-header">
                            <span class="float-left m-1">
                                <img src="{{ asset( $discussion->user->avatar) }}" 
                                alt="{{ $discussion->user->name }}" class="avatar float">
                            </span>
                            <h2 class="h4 text-secondary">
                                {{ str_limit($discussion->title) }}
                            </h2>
                            <span>Thready by, 
                            @if(Auth::id() == $discussion->user->id)
                                <strong class="text-primary">
                                    <a href="#">
                                        You
                                    </a>
                                </strong>
                            @else
                                <strong class="text-primary">
                                    <a href="#">
                                        {{ $discussion->user->name }}
                                    </a>
                                </strong>
                            @endif
                                <strong>,{{ $discussion->created_at->diffForHumans() }}</strong>
                            </span>
                            <span class="float-right">
                            @if(Auth::check())
                                <!-- checking-if-user-is-already-watching -->
                                @if($discussion->isUserWatching($discussion->id))
                                <a href="{{ route('discussion.removeWatcher', ['id' => $discussion->id ]) }}" class="btn btn-sm btn-danger">Unwatch</a>
                                @else 
                                <a href="{{ route('discussion.addWatcher', ['id' => $discussion->id ]) }}" class="btn btn-sm btn-success">Watch</a>
                                @endif

                                <!-- checking-if-user-is-the-owner-of-the-post -->
                                @if($discussion->status == 0)
                                <a href="#" class="btn btn-sm btn-warning"><b>Open</b></a>
                                    @if($discussion->checkPostOwnership($discussion->id))
                                    <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}" 
                                        class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="{{ route('discussion.destroy', ['slug' => $discussion->slug]) }}" class="btn btn-sm btn-danger">x</a>
                                    @endif
                                @else 
                                <a href="#" class="btn btn-sm btn-danger"><b>Closed</b></a>
                                @endif
                            @endif
                            </span>
                        </div>

                        <div class="card-body">
                            <p class="text-secondary">
                                {!! Markdown::convertToHtml($discussion->content) !!}
                            </p>

                            <!-- best-replies-user-profile -->
                            
                            <!--  <div class="mb-3 card">
                                <div class="card-header">
                                    <span class="float-left m-1">
                                        @if($discussion->reply)
                                        @else
                                            <img src="{{ asset('img/avatar/avatar.png') }}" 
                                            alt="{{ $discussion->user->name }}" class="avatar">
                                        @endif
                                    </span>
                                    <h2 class="h4 text-secondary">
                                        Lorem Ipsum{{-- str_limit($discussion->title) --}}
                                    </h2>
                                </div>
                                <div class="card-body">

                                    <p>Reply</p>

                                </div>
                            </div> -->
                            
                            <!-- best-replies-user-profile -->
                        </div>
                    </div>
                </div>
                <!-- /discussion-box -->

                 <!-- reply-section-->
                 <div class="card">
                 	<div class="card-header bg-success">
                 	@if($discussion->replies->count() > 0)
                 		<h2 class="font-weight-bold text-light">Did you find this interesting ?</h2>
                 	@else 
                 		<h2 class="font-weight-bold text-light">Be the first one to reply this discussion</h2>
                 	@endif
                 	</div>
                 	<div class="card-body">

                 		<!-- comment-box -->
                 		<form method="POST" 
                 		action="{{ route('reply.store', ['discussion_id' => $discussion->id ]) }}">
                 			{{ csrf_field() }}
	                 		<div class="form-group">
	                 			<textarea class="form-control form-control-lg" id="contact_address" rows="5" cols="5" name="content" id="content" placeholder="Tell us about the post..."></textarea>
	                 		</div>
	                 		<div class="submit-button">
	                 			<button type="submit" name="submit" class="btn btn-dark text-light">Leave Your Reply</button>
	                 		</div>
	                 	</form>	<!-- /comment-box -->

	                 	<!-- recent-comments -->
	                 	
	                @if($discussion->replies->count() > 0)
	                 	@foreach($discussion->replies as $reply)
	                 	<div class="my-4 card">
	                        <div class="card-header">
	                            <span class="float-left m-1">
                                    @if($reply->user->avatar)
	                                <img src="{{ asset($reply->user->avatar) }}" 
	                                alt="{{ $reply->user->name }}" class="avatar float">
                                    @else
                                    <img src="{{ asset('img/avatar/avatar.png') }}" 
                                    alt="{{ $reply->user->name }}" class="avatar float">
                                    @endif
	                            </span>
	                            <h2 class="h5 text-secondary">
                                @if(Auth::id() == $reply->user_id) 
	                               <strong class="text-primary">
	                                	<a href="#">You</a>
	                                </strong>
                                @else
                                    <strong class="text-primary">
                                        <a href="#">{{ $reply->user->name }}</a>
                                    </strong>
                                @endif
	                            </h2>
	                            <span class="font-weight-bolder"> 
	                                <strong class="text-secondary">
	                                	Replied, {{ $reply->created_at->diffForHumans() }}
	                                </strong>
	                            </span>
                                 <span class="float-right">
                                @if($reply->discussion->status == 0)
                                    @if(Auth::id() == $discussion->user->id) 
                                    <a href="{{ route('reply.best', ['id' => $reply->id]) }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-heart"></i>
                                        <b>Claim As Best Reply</b>
                                    </a>
                                    @endif
                                @endif
                                </span>
	                        </div>

	                        <div class="card-body">
	                            <p class="text-secondary">
	                               {!! Markdown::convertToHtml($reply->content) !!}
	                            </p>  

                                <!-- share-button -->
	                            <div class="share-button">
	                            </div>
	                        </div>

	                        <div class="card-footer">
	                        	<strong>
	                        	
		                        	<!-- Dislike Button -->
	                        	@if($reply->isLiked($reply->id)) 
									<span>
		                        		<a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="text-dark">
		                        			<i class=" fa fa-thumbs-down"></i> 
		                        			<span class="p-1">Dislike ({{ $reply->likes->count() }})</span>
		                        		</a>
		                        	</span>
		                       	@else
	                        		<!-- Like Button -->
									<span class="pr-1">
		                        		<a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="text-danger">
		                        			<i class="fa fa-thumbs-up"></i> 
		                        			<span class="p-1">Like ({{ $reply->likes->count() }})</span>
		                        		</a>
		                        	</span>
		                       	@endif


		                        	<!-- Reply Button -->
		                        	<span class="pr-1">
		                        		<a href="#writeBackReplyBox" class="text-success" data-toggle="collapse" role="button">
		                        			<i class="fa fa-comment"></i> 
		                        			<span class="p-1">Write Back</span>
		                        		</a>
                                        <div class="collapse" id="writeBackReplyBox">
                                            <!-- write-back-reply-box -->
                                            <form method="POST" 
                                            action="{{ route('reply.store', ['discussion_id' => $discussion->id ]) }}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <textarea class="form-control form-control-lg" id="contact_address" rows="5" cols="5" name="content" id="content" placeholder="Suggest a better option here..."></textarea>
                                                </div>
                                                <div class="submit-button">
                                                    <button type="submit" name="submit" class="btn btn-dark text-light">Leave Your Reply</button>
                                                </div>
                                            </form> <!-- /write-back-reply-box -->
                                        </div>

		                        	</span>

                                    <!-- comment-edit-delete-button -->
                                @if(Auth::id() == $reply->user_id)
                                    <div class="pr-1 float-right">
                                        <span class="btn btn-sm btn-dark">
                                            <a href="#" class="text-light">
                                                <i class="fa fa-edit"></i> 
                                                <span class="p-1">Edit</span>
                                            </a>
                                        </span>
                                        <span>
                                            <a href="{{ route('reply.delete', ['id' => $reply->id]) }}" class="btn btn-sm btn-danger">
                                                <b>X</b>
                                            </a>
                                        </span>
                                    </div>
                                @endif
		                        	<!-- append-the-comment-box-dynamically -->
		                        	<div class="container">

		                        	</div>
		                      
	                        	</strong>
	                        </div>
                    	</div>	<!-- recent-comments -->

                    	@endforeach
                    @endif
                 	</div> <!-- /card-body -->

                 </div>	<!-- /card -->

                <!-- /reply-section-->

            </div>

        </div>  <!-- /main-card-body -->

    </div>
    <!-- /main-card-wrapper -->

   	
   	<!-- create-the-comment-box-dynamically-->
    <script>


    </script>

@endsection
