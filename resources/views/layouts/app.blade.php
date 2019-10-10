<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YourSpace') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Mansalva|Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/default.min.css">


</head>
<body id="bgcolor">
    <div id="app">

<!--------------------------------------------- header-wrapper ------------------------------------------>

        <header class="sticky-top">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container remove-padding">
                    @if(Auth::check())
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="h1">{{ config('app.name', 'YourSpace') }}</span>
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="h1">{{ config('app.name', 'YourSpace') }}</span>
                    </a>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <span class="h4 font-weight-bold">{{ __('Login') }}</span>
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <span class="h4 font-weight-bold">{{ __('Register') }}</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       <span class="h4 font-weight-bold">{{ Auth::user()->name }}</span>
                                        <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <span class="h5">{{ __('Logout') }}</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

<!--------------------------------------------- body-wrapper -------------------------------------------->

        <main>
            <div class="container-fluid my-4">
        
                <div class="row">

                    <!-- left-sidebard -->
                    <div class="col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="text-dark">Welcome back, 
                                    <span class="text-success"><b>{{ Auth::user()->name }}</b></span>
                                </h3>

                                <!-- navigation-bar -->
                                <nav class="navigation-bar">
                                    <ul class="list-group">    
                                        <li class="list-group-item">
                                            <a href="{{ route('home') }}">
                                                Home
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">
                                                Dashboard
                                            </a>    
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">
                                                My Channels
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">
                                                My Discussions
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">
                                                Customize Profile
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">                                    
                                                Manage User Account
                                            </a>                                        
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">                                
                                                Preferences
                                            </a>                                    
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- search-filter-for-auth-user -->
                        <div class="my-2 card">
                            <div class="card-body">
                                <h3 class="text-dark">Sort Discussions By</h3>
                                  <ul class="list-group style-anchor">    
                                        <li class="list-group-item">
                                        <a href="#" class="text-primary">
                                            Ownership(you)
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="text-primary">
                                            Max Reply
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="text-primary">
                                            Open Discussion
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="text-primary">
                                            Closed Discussion
                                        </a>
                                    </li>
                                     
                                </ul>
                            </div>
                        </div>

                         <!-- subscribe-to-news-letter -->
                        <div class="my-2 card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <p class="h4 text-light">Newsletter</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="title" placeholder="Latest blog & favourite topics">
                                                </div>
                                            @error('title')
                                                <div>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <span class="text-danger">*{{ $message }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @enderror  
                                                <button type="submit" class="btn btn-sm btn-info">
                                                    <span class="h5">Let's Go</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                
                    </div>
                    <!-- /left-sidebard -->

                    <!-- center-content -->
                    <div class="col-lg-6 col-md-6 remove-padding">
                        <div class="container remove-padding">

                            @yield('content')   

                        </div>
                    </div>
                    <!-- /center-content -->

                    <!-- right-sidebard -->

                    <div class="col-lg-3 col-md-3">
                        
                        <!-- search-bar -->
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <p class="h5 text-light">Search Channels or Discussions</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                {{ csrf_field() }}
                                                <!-- <div class="form-group"> -->
                                                <input type="text" class="form-control" name="search" placeholder="Search Keywords eg, VueJs etc">
                                                <!-- </div> -->
                                                 @error('search')
                                                <div>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <span class="text-danger">*{{ $message }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @enderror  
                                           
                                                <!-- <div class="text-center"> -->
                                                <button type="submit" class="mt-2 btn btn-sm btn-primary">
                                                    <!-- <span class="h5"> -->
                                                        <i class="fa fa-search"> Search</i>
                                                    <!-- </span> -->
                                                </button>
                                                <!-- </div> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>

                        <!-- start-new-discussion-button -->
                        <div class="my-2 card">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{ route('discussion.create') }}" class="btn btn-lg btn-warning">
                                        <span class="text-dark">Have Something to Discuss</span>
                                    </a>
                                </div>
                            </div>                    
                        </div>

                        <!-- start-new-channel-button -->
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="card">
                                        <div class="card-header bg-success">
                                            <p class="h4 text-light">Broadcast Your Channel Now</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('channels.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <!-- <label for="title" class="h5 text-dark text-center">
                                                        Broadcast Your New Channel now
                                                    </label> -->
                                                    <input type="text" class="form-control" name="title" placeholder="Create your first Channel here .">
                                                </div>
                                            @error('title')
                                                <div>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <span class="text-danger">*{{ $message }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @enderror  
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <span class="h5">Let's Go Live</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>

                        <!-- join-channel-button -->
                        <div class="my-2 card">
                            <div class="card-body">
                                <h3 class="text-dark">Join Existing Channel</h3>
                                <ul class="list-group">    
                                @foreach($channels as $channel)
                                    <li class="list-group">
                                        <a href="{{ route('channels.show' , ['channel' => $channel->id ]) }}" 
                                            class="h5 list-group-item text-primary">
                                            {{ $channel->title }}
                                        </a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /right-sidebard -->

                </div>
        </main>
<!--------------------------------------------- footer-wrapper------------------------------------------->
        @if(Auth::check())
        <footer class="sticky-bottom bg-dark">
            <div class="container">
                <div class="row p-2 text-light">
                    <div class="col-lg-4">
                        <p class="h5 p-2">Copyright 2012 by fallDevelopers.</p>
                    </div>
                    <div class="col-lg-4">
                        <p></p>
                    </div>
                    <div class="col-lg-4">
                        <p class="h1 text-right">YourSpace</p>
                    </div>
                </div>
            </div>
        </footer>
        @endif 
<!---------------------------------------------- scripts ------------------------------------------------>
    </div>  <!-- /app -->    
    

    <!-- general scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
   

    <!-- toastr -->
    <script>
        @if(Session::has('success'))

            toastr.success("{{ Session::get('success')}}");

        @elseif(Session::has('info'))

            toastr.info("{{ Session::get('info')}}");

        @elseif(Session::has('warning'))

            toastr.warning("{{ Session::get('warning')}}");

        @elseif(Session::has('danger'))

            toastr.error("{{ Session::get('danger')}}");
            
        @endif
    </script>
    
    <!-- highlightJs -->
     <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</body>
</html>
