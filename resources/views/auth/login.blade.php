<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}" />
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <title>Midmap | Login</title>
</head>
 
<body id="home2">
    <div id="preloader">
        <div class="preloader-container">
            <div class="item item-1"></div>
            <div class="item item-2"></div>
            <div class="item item-3"></div>
            <div class="item item-4"></div>
        </div>
    </div>
 
    <header class="header accent-lightBlue">
        <div class="h-bottom-container">
            <div class="container-stretch">
                <div class="h-bottom-inner">
                    <div class="p-left">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('assets/images/logos/a1.PNG') }}" alt /></a>
                        </div>
                        <div class="m-logo">
                            <a href="/"><img src="{{ asset('assets/images/logos/a1.PNG') }}" alt /></a>
                        </div>
                    </div>
                    <div class="p-center">
                        <nav>
                            <ul class="main-nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('site.centers') }}">Clinics</a></li>
                                <li><a href="/">Blog</a></li>
                                <li><a href="#Contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="p-right">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-s1">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-s1">Log in / Register</a>
                        @endauth
                        <button id="m-nav-open">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
    <aside id="m-nav-container">
        <div class="m-nav-inner">
            <button id="m-nav-close">
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </button>
            <div class="logo">
                <img src="{{ asset('assets/images/logos/a1.PNG') }}" alt />
            </div>
            <ul class="main-nav">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('site.centers') }}">Clinics</a></li>
                <li><a href="/">Blog</a></li>
                <li><a href="#Contact">Contact</a></li>
                <li>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in / Register</a>
                    @endauth
                </li>
            </ul>
        </div>
    </aside>
 
    <section class="signup-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-main__form">
                        <form method="POST" action="{{ route('login') }}" class="form">
                            @csrf
                            <h3 class="frm-header">Log In</h3>
                            <div class="inner-wrap">
 
                                <div class="s-input">
                                    <label for="email">Email</label>
                                    <input id="email" class="block mt-1 w-full" type="email" name="email"
                                        value="{{ old('email') }}" required autofocus autocomplete="username"
                                        placeholder="Your Email" />
                                    @error('email')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
 
                                <div class="s-input">
                                    <label for="password">Password</label>
                                    <input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="current-password"
                                        placeholder="********" />
                                    @error('password')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
 
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                    <div class="s-input t-right">
                                        @if (Route::has('password.request'))
                                            <a class="forgot-pass-btn" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>
                                </div>
 
                                <div class="f-bottom">
                                    <button type="submit" class="btn btn-s2 btn-lg">Login</button>
                                    <p>Don't have an account? <a href="{{ route('register') }}">Create Account</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <ul class="animated-boxes-l animated-boxes">
                <li></li><li></li><li></li><li></li><li></li><li></li>
            </ul>
            <ul class="animated-boxes-r animated-boxes">
                <li></li><li></li><li></li><li></li><li></li><li></li>
            </ul>
        </div>
    </section>
 
    <footer class="footer-s1 footer-s2">
        <div class="container">
            <div class="footer-m-wrap">
                <div class="f-widget widget-1">
                    <div class="logo">
                        <img src="{{ asset('assets/images/logos/a1.PNG') }}" alt />
                    </div>
                </div>
            </div>
        </div>
        <div class="container-stretch">
            <div class="f-copy-right">
                <div class="p-left">
                    <ul class="s-links">
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                    <p class="cr-text">©2024 Midmap All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
 
    <script src="{{ asset('assets/js/vendor/font-awesome.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/aos.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/scrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/animations.js') }}"></script>
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
 
</html>