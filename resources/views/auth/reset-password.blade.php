<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Password Reset | Admin | Control Panel </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A complete CRUD website to demonstrate basic Laravel skills" name="description" />
        <meta content="Edgar Owarwo" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("backend/assets/images/favicon.ico") }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset("backend/assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset("backend/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset("backend/assets/css/app.min.css") }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="" class="auth-logo">
                                    <img src="{{ asset("backend/assets/images/smart_tech.png") }}" height="100" class="logo-dark mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Password Reset</b></h4>
    
                        <div class="p-3">                            
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('password.store') }}">
                                @csrf
    
                                 <!-- Password Reset Token -->
                                 <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group mb-3 row">
                                    @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @enderror
                                    <div class="col-12 md-4">
                                        <input class="form-control" id="email" type="email" placeholder="Email" name="email" :value="old('email', $request->email)" required="">
                                    </div>                                    
                                </div>
    
                                <div class="form-group mb-3 row">
                                    @error('password')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @enderror
                                    <div class="col-12 md-4">
                                        <input class="form-control" id="password" type="password" placeholder="Password" name="password" autocomplete="current-password" required="">
                                    </div>                                    
                                </div>

                                <div class="form-group mb-3 row">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @enderror
                                    <div class="col-12 md-4">
                                        <input class="form-control" id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation" required="">
                                    </div>                                    
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-warning w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-7 mt-3">                                        
                                        <a href="{{ route('login') }}" class="text-muted"><i class="mdi mdi-lock"></i> Sign in?</a>                                        
                                    </div>
                                    <div class="col-sm-5 mt-3">
                                        <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset("backend/assets/libs/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/metismenu/metisMenu.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/simplebar/simplebar.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/node-waves/waves.min.js") }}"></script>

        <script src="{{ asset("backend/assets/js/app.js") }}"></script>

    </body>
</html>
