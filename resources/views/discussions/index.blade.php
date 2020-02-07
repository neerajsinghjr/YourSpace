@extends('layouts.app')

@section('content')
    
    <!-- main-card-wrapper -->
    <div class="card">
        <div class="card-header">
            <h2 class="h4 text-success">Recently Created Discussion</h2>
        </div>

        <div class="card-body">   
            <div class="container remove-padding">

                <!-- Discussion-box-->
                <div class="discussion-box">
                @foreach($discussions as $discussion)
                    <div class="mb-3 card">

                        <div class="card-header">
                            <span class="float-left m-1">
                                @if($discussion->user->avatar)
                                <img src="{{ asset( $discussion->user->avatar) }}" 
                                alt="{{ $discussion->user->name }}" class="avatar float">
                                @else
                                <img src="{{ asset('img/avatar.png') }}" 
                                alt="{{ $discussion->user->name }}" class="avatar float">
                                @endif
                            </span>
                            <h2 class="h4 text-danger">
                                {{ str_limit($discussion->title, 50) }}
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
                                <!-- checking-if-user-is-already-watching-dicussion -->
                                @if($discussion->isUserWatching($discussion->id))
                                <a href="{{ route('discussion.removeWatcher', ['id' => $discussion->id ]) }}" class="btn btn-sm btn-danger">Unwatch</a>
                                @else 
                                <a href="{{ route('discussion.addWatcher', ['id' => $discussion->id ]) }}" class="btn btn-sm btn-success">Watch</a>
                                @endif

                                <!-- checking-if-user-is-the-owner-of-the-post -->
                                @if($discussion->status == 0)
                                <a href="javascript:void(0)" class="btn btn-sm btn-warning"><b>Open</b></a>
                                    @if($discussion->checkPostOwnership($discussion->id))
                                    <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}" 
                                        class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="{{ route('discussion.destroy', ['slug' => $discussion->slug]) }}" class="btn btn-sm btn-danger">x</a>
                                    @endif
                                @else 
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger"><b>Closed</b></a>    
                                @endif
                            @endif
                            </span>

                        </div>

                        <div class="card-body">
                            <p class="text-dark">
                                <em>{{ str_limit($discussion->content, 256) }}</em>
                            </p>
                             <a href="{{ route('discussions.show', ['id' => $discussion->slug])}}" 
                                class="h4 btn btn-sm btn-success font-weight-bolder">
                                Read More
                            </a>
                        </div>

                        <div class="card-footer">
                        @if($discussion->replies->count() > 0)
                            <a href="{{ route('discussions.show', ['id' => $discussion->slug])}}"
                                class="btn btn-light"> 
                                <strong>Reply by {{ $discussion->replies->count() }} Users</strong>
                            </a>
                        @else
                            <a href="{{ route('discussions.show', ['id' => $discussion->slug])}}"
                                class="btn btn-light"> 
                                <strong>Reply</strong>
                            </a>
                        @endif
                            <span class="float-right">
                                <a href="{{ route('channels.show' , ['channels' => $discussion->channel->id  ]) }}" class="btn btn-sm btn-dark">
                                    <span class="h6"> {{ $discussion->channel->title }} </span>
                                </a>
                            </span>
                        </div>
                    </div>
                @endforeach
                </div>
                <!-- /discussion-box -->

                <!-- discussion-pagination -->
                <div class="mt-4 pagination-center">
                    <span>{{ $discussions->links() }}</span>
                </div>
                <!-- /discussion-pagination -->

            </div>
        </div>

    </div>
    <!-- /main-card-wrapper -->
    

@endsection
