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
<div class="account-pages my-1">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-10">
                <div class="text-center">
                    <a href="{{route('dashboard')}}">
                        <img src="#" alt="{{env('APP_NAME')}}" height="22" class="mx-auto">
                    </a>
                    <p class="text-muted mt-2 mb-4">{{env('APP_NAME')}}</p>

                </div>
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Inscription</h4>
                        </div>

                        <form method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nom</label>
                                    <input class="form-control" name="firstname" type="text" id="name" required="" placeholder="Enter your name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="lastname" class="form-label">Prenom</label>
                                    <input class="form-control" name="lastname" type="text" required="" id="lastname" placeholder="Enter your lastName">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telephone</label>
                                    <input class="form-control" name="phone" type="text" id="name" required="" placeholder="Enter your Telephone">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="adressepostale" class="form-label">Adresse postal</label>
                                    <input class="form-control" name="adressepostal" type="text" required="" id="adressepostale" placeholder="Enter your adressepostale">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Adresse</label>
                                    <input class="form-control" name="adresse" type="text" id="name" required="" placeholder="Enter your Adresse">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="commune" class="form-label">Commune</label>
                                    <input class="form-control" name="commune" type="text" required="" id="commune" placeholder="Enter your commune">
                                </div>
                            </div>

                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-success" type="submit"> S'inscrire </button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="#" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Forgot your password?</a></p>
                        <p class="text-muted">Avez vous deja un compte? <a href="{{route('login')}}" class="text-dark ms-1"><b>Se connecter</b></a></p>
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
