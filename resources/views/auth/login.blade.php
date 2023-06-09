<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}} | Login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons.min.css')}}">
</head>
<body class="loading authentication-bg authentication-bg-pattern">
<div class="account-pages">
    <div class="container">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="text-center">
                    <a href="/">
                       {{-- <img src="{{asset('storage/images/oxfam.png')}}" alt="" height="50" class="mx-auto">--}}
                    </a>
                    <p class="text-muted mt-2 mb-4">{{env('APP_NAME')}}</p>

                </div>
                @include("_partials.errors-and-messages")
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Sign In</h4>
                        </div>

                        <form method="POST" action="{{ route('loginstore') }}" >
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="{{route('reset_password')}}" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Forgot your password?</a></p>
                        <p class="text-muted">Don't have an account? <a href="{{route('register')}}" class="text-dark ms-1"><b>Sign Up</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<script src="{{asset('js/vendor.min.js') }}"></script>
<script src="{{asset('js/app.min.js') }}"></script>

</body>

</html>
