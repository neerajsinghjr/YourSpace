@extends('layouts.app')

@section('content')
    <div class="container remove-padding">
        <div class="card">
            <div class="card-header">
                <p class="h4 font-weight-bold text-success">Q: {{ $discussion->title }}</p>
            </div>

            <div class="card-body">    
            	<div class="container">  
            		<!-- page-content -->
                	<form action="{{ route('discussion.update', ['slug' => $discussion->slug]) }}" method="post">

                		{{ csrf_field() }}              	                	
	                		
	                		<div class="form-group">
	                			<label for="content" class="h5 text-dark">Discussion Story</label>
	                			<textarea name="content" id="content" rows="20" class="form-control form-control-lg">{{ $discussion->content }}
	                			</textarea>
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

	            			<div class="text-center float-right">
	            				<button type="submit" class="btn btn-success">
	            					<span class="h5">Save Changes</span>
	            				</button>
	            			</div>                			

                	</form>
	                <!-- /page-content -->
	            </div>
            </div>
        </div>
    </div>
@endsection
