@extends('layouts.app')

@section('content')
    
    <!-- main-card-wrapper -->
    <div class="card">
        <div class="card-header">
            <h2 class="h4 text-yellow">Sorry For Inconvenience.</span></h2>
        </div>

        <div class="card-body">   
            <div class="text-center container">
                <img src="{{ asset('img/error.gif') }}" alt="error" class="error-thumb">
                @if($message)
                <p class="mt-4 h4 text-primary font-weight-bold">{{ $message }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 text-center">
            <strong>
                <a href="{{ route('home') }}" class="h4 text-light font-weight-bold btn btn-success btn-lg">
                    <span><i class="fa fa-home fa-lg"></i> HOME</span>
                </a>
            </strong>
        </div>
    </div>
    <!-- /main-card-wrapper -->
    

@endsection
