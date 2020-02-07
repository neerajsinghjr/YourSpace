@extends('layouts.app')

@section('content')
    
    <!-- main-card-wrapper -->
    <div class="card">
        <div class="card-header">
            <p class="h3 text-center text-success">
            	<a href="#" class="text-success"><b>{{ $channel }}</b></a> Channel's Discussion
            </p>
        </div>

        <div class="card-body">   
            <div class="container remove-padding">

                <!-- Discussion-box-->
                <div class="discussion-box">
                @foreach($discussions as $discussion)
                    <div class="mb-3 card">

                        <div class="card-header">
                            <span class="float-left m-1">
                                <img src="{{ asset( $discussion->user->avatar) }}" 
                                alt="{{ $discussion->user->name }}" class="avatar float">
                            </span>
                            <h2 class="h4 text-danger">
                                {{ str_limit($discussion->title, 50) }}
                            </h2>
                            <span>Thready by, 
                                <strong class="text-primary">
                                    <a href="#">
                                        {{ $discussion->user->name }}
                                    </a>
                                </strong>
                                <strong>,{{ $discussion->created_at->diffForHumans() }}</strong>
                            </span>
                            <span class="float-right">
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
                            </span>

                        </div>

                        <div class="card-body">
                            <p class="h5 text-secondary">
                                <em>{{ str_limit($discussion->content, 156) }}</em>
                            </p>
                             <a href="{{ route('discussions.show', ['id' => $discussion->slug])}}" 
                                class="h4 btn btn-sm btn-success font-weight-bolder">
                                Read More
                            </a>
                        </div>

                        <div class="card-footer">
                            <strong>Reply By ({{ $discussion->replies->count()}})
                                <a href="#">Users</a>
                            </strong>
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
                <div class="m-auto">    
                    <span>{{-- $discussions->links() --}}</span>
                </div>
                <!-- /discussion-pagination -->

            </div>
        </div>

    </div>
    <!-- /main-card-wrapper -->
    

@endsection
