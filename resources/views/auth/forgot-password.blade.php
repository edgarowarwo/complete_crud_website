<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Forgot Password | Admin | Control Panel </title>
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
    
                        <h4 class="text-muted text-center font-size-18"><b>Request Password Reset Link</b></h4>

                        <div class="mb-4 text-sm text-gray-600">
                            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                        </div>

                        <!-- Session Status -->                        
                        @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="p-3">                             
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group mb-3 row">
                                    @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @enderror
                                    <div class="col-12 md-4">
                                        <input class="form-control" id="email" type="email" placeholder="Email" name="email" required="">
                                    </div>                                    
                                </div>
    
                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-warning w-100 waves-effect waves-light" type="submit"> Email Password Reset Link </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
