<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'YourSpace') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            h3{
                color: purple;
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <!-- upper-right-nav-bar -->
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <!-- main-body -->
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="title m-b-md">
                            {{ config('app.name', 'YourSpace') }}
                            </div>
                            <div>
                                <h2>Speak Freely & Speak Loud </h2>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h2">Sign up now to feel free to Speak</h2>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <a href="{{ route('register') }}" class="btn btn-dark" class="text-light">
                                        <strong>Signup us using Email</strong></a>
                                </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                    <a href="{{ route('social.auth', ['provider' => 'facebook']) }}" class="btn btn-dark" class="text-light">
                                    <strong>Signup us using Facebook</strong></a>
                                </div>                       
                            </div>
                            <div class="row mt-2">
                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                    <a href="{{ route('social.auth', ['provider' => 'google']) }}" class="btn btn-dark" class="text-light">
                                    <strong>Signup us using Google</strong></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <a href="{{ route('social.auth', ['provider' => 'github']) }}"class="btn btn-dark" class="text-light">
                                    <strong>Signup us using Github</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
