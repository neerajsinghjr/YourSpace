@extends('layouts.app')

@section('content')
    <div class="container remove-padding">
        <div class="card">
            <div class="card-header">
                <p class="h4 text-center text-success">Start A Discussion</p>
            </div>

            <div class="card-body">    
            	<div class="container">  
            		<!-- page-content -->
                	<form action="{{ route('discussion.store') }}" method="post">

                		{{ csrf_field() }}

                		<!-- title-of-discussion -->
                			<div class="form-group">
                				<label for="title" class="h5 text-dark">Discussion Title</label>
                				<input type="text" class="form-control form-control-lg" name="title" placeholder="Your dicussion's title is going to be here..." value ="{{ old('title') }}">
                			</div>
		                	@error('title')
	                			<div class="container m-2">
	                				<ul class="list-group text-center">
	                					<li class="h5 list-group-item fold-weight-bolder text-danger">
	                						{{ $message }}
	                					</li>
	                				</ul>
	                			</div>
	                		@enderror
	                		

	                		<!-- select-the-channels -->
	                		<div class="form-group">
                				<label for="title" class="h5 text-dark">Select the Channel</label>
                				<select for="channels" name="channel_id" class="form-control form-control-lg">
                					<option>Choose Channels</option>
                				@foreach($channels as $channel)	
                					<option value="{{ $channel->id }}" class="h5 text-dark">
                						{{ $channel->title }}
                					</option>
								@endforeach
                				</select>
                			</div>

		                	@error('channel_id')
	                			<div class="container m-2">
	                				<ul class="list-group text-center">
	                					<li class="h5 list-group-item fold-weight-bolder text-danger">
	                						{{ $message }}
	                					</li>
	                				</ul>
	                			</div>
	                		@enderror
	                		
	                		<div class="form-group">
	                			<label for="content" class="h5 text-dark">Discussion Story</label>
	                			<textarea name="content" id="content" rows="15" cols="10" class="form-control form-control-lg" placeholder="Your discussion story is here ....">{{ old('title') }}</textarea>
	                		</div>
	                		@error('content')
	                			<div class="container m-2">
	                				<ul class="list-group text-center">
	                					<li class="h5 list-group-item fold-weight-bolder text-danger">
	                						{{ $message }}
	                					</li>
	                				</ul>
	                			</div>
	                		@enderror

	                		<!--  -->

	            			<div class="text-center">
	            				<button type="submit" class="btn btn-success">
	            					<span class="h5">Start Discussing</span>
	            				</button>
	            			</div>                			

                	</form>
	                <!-- /page-content -->
	            </div>
            </div>
        </div>
    </div>
@endsection
