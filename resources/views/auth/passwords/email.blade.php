<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title>Login | تسجيل الدخول</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('css/custome.css')}}" type="text/css"/>
    </head>
    <body class="be-splash-screen">
        @if(session('status')){
            <div class=""> done</div>
        }
        @endif
        <div class="be-wrapper be-login">
            <div class="be-content">
                <div class="main-content container-fluid">
                    <div class="splash-container">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-heading"><img src="{{ asset('assets/img/giga-logo1.png')}}" alt="logo" width="155" height="77" class="logo-img"><span class="splash-description">الرجاء إدخال معلوماتك لتسجيل الدخول</span></div>
                            <div class="panel-body">
                                
                                <form method="POST" action="{{ route('password.email') }}">
                                    {{-- <form method="POST" action="{{ route('forgot-password') }}">
                                        @method('PUT')  --}}
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email"
                                            class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            
                                            <div class="col-md-12">
                                                <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                                                
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="splash-footer"><span>Copyright 2019 GIGA Ltd. | All Rights Reserved</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{ asset('assets/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
            <script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
            <script src="{{ asset('assets/js/main.js" type="text/javascript')}}"></script>
            <script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    //initialize the javascript
                    App.init();
                });
                
            </script>
        </body>
        </html>
        