<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.neptuneapp.xyz/demo-1/ltr/auth_login_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jun 2023 07:32:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="http://demo.neptuneapp.xyz/common-assets/img/favicon.ico"/>
    <!-- Common Styles Starts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('admin-theme/common-assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/assets/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/assets/css/structure.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/common-assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/common-assets/plugins/highlight/styles/monokai-sublime.css')}}" rel="stylesheet" type="text/css" />
    <!-- Common Styles Ends -->
    <!-- Common Icon Starts -->
    <link rel="stylesheet" href="{{ asset('admin-theme/maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css')}}">
    <!-- Common Icon Ends -->
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{ asset('admin-theme/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/common-assets/plugins/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-theme/common-assets/plugins/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-theme/assets/css/authentication/auth_1.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
</head>
<body class="login-one">
    <!-- Loader Starts -->
    <div id="load_screen"> 
        <div class="boxes">
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
        </div>
        <p class="neptune-loader-heading">Lab Complaint System</p>
    </div>
    <!--  Loader Ends -->
    <!-- Main Body Starts -->
    <div class="container-fluid login-one-container">
        <div class="p-30 h-100" >
            <div class="row main-login-one h-100">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                    <div class="login-one-start">
                        <h6 class="mt-2 text-primary text-center font-20">Log In</h6>
                        <p class="text-center text-muted mt-3 mb-3 font-14">Please Log into your account</p>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-one-inputs mt-5">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Please Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <i class="las la-user-alt"></i> 
                        </div>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="login-one-inputs mt-3">
                        <input id="password" type="password" placeholder="Please Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <i class="las la-lock"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="login-one-inputs check mt-4">
                            <input class="inp-cbx" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label>
                                <span class="font-13 text-muted">Remember me ?</span>
                            </label>
                        </div>
                        <div class="login-one-inputs mt-4">
                            <button class="ripple-button ripple-button-primary btn-lg btn-login" type="submit">
                                <div class="ripple-ripple js-ripple">
                                <span class="ripple-ripple__circle"></span>
                                </div>
                                LOG IN
                            </button>
                        </div>
                        </form>
                        <div class="login-one-inputs mt-4 text-center font-12 strong">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-primary">Forgot your Password ?</a>
                            @endif
                        </div>
                        <div class="login-one-inputs social-logins mt-4">
                            <div class="social-btn"><a href="#" class="fb-btn"><i class="lab la-facebook-f"></i></a></div>
                            <div class="social-btn"><a href="#" class="twitter-btn"><i class="lab la-twitter"></i>
                            </a></div>
                            <div class="social-btn"><a href="#" class="google-btn"><i class="lab la-google-plus"></i>
                            </a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                    <div class="slider-half">
                        <div class="slide-content">
                            <div class="top-sign-up ">
                                <div class="about-comp text-white mt-2">Lab Complaint System</div>
                                <div class="for-sign-up">
                                    <!-- <p class="text-white font-12 mt-2 font-weight-300">Don't have an account ?</p>
                                    <a href="auth_signup_1.html">Sign Up</a> -->
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="owl-carousel owl-theme">
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <!-- Main Body Ends -->
  
    <script src="{{ asset('admin-theme/assets/js/loader.js')}}"></script>
    <script src="{{ asset('admin-theme/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-theme/assets/js/authentication/auth_1.js')}}"></script>
  
</body>

</html>