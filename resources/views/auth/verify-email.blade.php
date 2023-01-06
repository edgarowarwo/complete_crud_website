<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Email Verification | Admin | Control Panel </title>
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
    
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>
                
                        @if (session('status') == 'verification-link-sent')                            
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('verification.send') }}">
                                @csrf                                
    
                                <div class="form-group text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-warning w-100 waves-effect waves-light" type="submit">Resend Verification Email</button>
                                    </div>
                                </div>                                
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                              
                                <div class="form-group text-center row mt-3 md-4">
                                    <div class="col-12">
                                         <button type="submit" class="btn btn-danger w-30 waves-effect waves-light">
                                                {{ __('Log Out') }}                                    
                                         </button>
                                    </div>
                                </div>
                            </form>
                        </div>
    
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset("backend/assets/libs/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/metismenu/metisMenu.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/simplebar/simplebar.min.js") }}"></script>
        <script src="{{ asset("backend/assets/libs/node-waves/waves.min.js") }}"></script>

        <script src="{{ asset("backend/assets/js/app.js") }}"></script>

    </body>
</html>
