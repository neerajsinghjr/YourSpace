@extends('layouts.app')

@section('content')
    <div class="container remove-padding">
        <div class="card">
            <div class="card-header">
                <p class="h4 text-center text-success">Start A New Channel</p>
            </div>

            <div class="card-body">    
            	<div class="container">  
            		<!-- page-content -->
                	<form action="{{ route('channels.store') }}" method="post">
                		{{ csrf_field() }}
                		<!-- create-new-category -->
                			<div class="form-group">
                				<label for="title" class="h5 text-dark">Channel's Name</label>
                				<input type="text" class="form-control form-control-lg" name="title" placeholder="Channel's name should be easy catchy. E.g, Angular-Talks">
		                		@error('title')
		                		<div>
		                			<ul class="list-group">
		                				<li class="list-group-item">
		                					<span class="text-danger">*{{ $message }}</span>
		                				</li>
		                			</ul>
		                		</div>
		                		@enderror
	                		</div>

	            			<div class="text-center">
	            				<button type="submit" class="btn btn-success">
	            					<span class="h5">Start A New Channel</span>
	            				</button>
	            			</div>                			

                	</form>
	                <!-- /page-content -->
	            </div>
            </div>
        </div>
    </div>
@endsection
