<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="Digital Marketplace Template" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content />
    <meta property="og:image" content />

    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}" />
    <script src="{{ asset('assets/js/preloader.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <title>Degmark | Digital Marketplace Template</title>
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Fallback color */
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Adjust size of the modal */
            max-width: 500px;
            /* Maximum width */
        }

        /* Close Button */
        .close-btn {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            float: right;
            cursor: pointer;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
        <div class="h-top-container bg-gray">
            <div class="container-stretch">
                <div class="h-top-inner">
                    <div class="p-left">
                        <ul class="t-bar-menu">
                            @if (Route::has('login'))
                                <nav class="-mx-3 flex flex-1 justify-end">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Log in /
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-bottom-container">
            <div class="container-stretch">
                <div class="h-bottom-inner">
                    <div class="p-left">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('assets/images/logos/logo-blue.svg') }}" alt />
                            </a>
                        </div>
                        <div class="m-logo">
                            <a href="/">
                                <img src="{{ asset('assets/images/logos/m-logo.svg') }}" alt />
                            </a>
                        </div>
                    </div>
                    <div class="p-center">
                        <nav>
                            <ul class="main-nav">

                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.centers') }}">Centers</a>
                                </li>
                                <li><a href="/">Blog</a></li>
                                <li><a href="#Contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="p-right">

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
                <img src="{{ asset('assets/images/logos/logo-blue.svg') }}" alt />
            </div>
            <ul class="main-nav">

                <li><a href="\">Home</a></li>
                <li><a href="{{ route('site.centers') }}">Clinics</a>
                </li>
                <li><a href="\">Blog</a></li>
                <li><a href="#Contact">Contact</a></li>
            </ul>
        </div>
    </aside>



    <section class="page-banner-s1">
        <div class="container">
            <div class="row">
                <div class="p-banner-inner">
                    <h1 class="s-title">Clinics</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('site.show')}}">Home</a></li>
                        <li><a href=" ">Clinics Page</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shapes">
            <ul class="animated-boxes-l animated-boxes">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <ul class="animated-boxes-r animated-boxes">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </section>


    <section class="p-archive-main">
        <div class="container">
            <form action="{{ route('site.centers') }}">
                @csrf
                <div class="row p-search-cat">
                    <div class="col-md-3 d-flex justify-end">
                        <select class="p-catagories" name="city_id">
                            <option value="">    All Cities       </option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex justify-end">
                        <select class="p-catagories" name="category_id">
                            <option value=""> All Categories </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="s-bar-s2">
                            <div class="s-bar-inner">
                                <input type="text" name="search" placeholder="Search your products..." />
                                <button type="submit" class="btn btn-frm"><i
                                        class="fa-solid fa-magnifying-glass"></i>Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">

                <div class="col-lg-12">
                    <div class="p-archive-listing">
                        @foreach ($centers as $center)
                            <div class="col-xl-4 col-lg-4 col-md-4" data-aos="fade-up">
                                <div class="pro-box-s1">
                                    <div class="thumb">
                                        <img src="{{ asset('storage/files/' . $center->center_logo ?? '') }}" alt />
                                        <div class="purchas-preview-wrap">
                                            <a href="{{ route('site.center', $center->id) }}">Preview</a>

                                        </div>
                                    </div>
                                    <div class="content">
                                        <p class="p-meta">
                                            By<a class="author"> {{ $center->user->name }}
                                            </a>In
                                            <a href="{{ route('site.centers', ['category_id' => $center->category->id]) }}"
                                                class="catagory">{{ $center->category->name }}</a>
                                        </p>
                                        <h4 class="p-title"><a href="{{ route('site.center', $center->id) }}">
                                                {{ $center->center_name }}</a></h4>
                                        <div class="download-rating-wrap">
                                            <div class="p-meta">
                                                <a class="author">{{ $center->country->name }}</a> / <a
                                                    href="{{ route('site.centers', ['city_id' => $center->city->id]) }}"
                                                    class="catagory">{{ $center->city->name }}</a>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="pagination">
                        <button class="prev-page">
                            <span class="text">Previous Page</span>
                            <span class="icon"><i class="fa-solid fa-angle-left"></i></span>
                        </button>
                        <ul class="page-items">
                            <li><a class="current" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                        <button class="next-page">
                            <span class="text">Next Page</span><span class="icon"><i
                                    class="fa-solid fa-angle-right"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="simpleModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <p style="color: rgb(8, 187, 32)">{{ session('success') }}</p>
        </div>
    </div>
    <footer class="footer-s1 footer-s2">
        <div class="container">
            <div class="footer-subs-s2">
                <div class="footer-sub-s2-inner">
                    <h3 class="s-title" data-aos="fade-up">Subscribe Now</h3>
                    <p data-aos="fade-up" data-aos-delay="50">
                        Subscribe to get the latest themes, templates, Photos, Audio and offer information. Don't
                        worry, we won't send spam!
                    </p>
                    <div class="subs-form-s1" data-aos="fade-up" data-aos-delay="50">
                        <input type="text" placeholder="Enter your email address" />
                        <button class="btn-frm" type="submit">Subscribe</button>
                    </div>
                    -
                </div>
            </div>
            <div class="footer-m-wrap">
                <div class="f-widget widget-1">
                    <div class="logo">
                        <img src="{{ asset('assets/images/logos/logo-blue.svg') }}" alt />
                    </div>
                    <ul class="f-menu">
                        <li><a href="products.html">Track Order</a></li>
                        <li><a href="products.html">Delivery & Returns</a></li>
                        <li><a href="products.html">Warranty</a></li>
                    </ul>
                </div>
                <div class="f-widget widget-2">
                    <h4 class="w-title">About us</h4>
                    <ul class="f-menu">
                        <li><a href="profile.html">Rave’s Story</a></li>
                        <li><a href="profile.html">Work With Us</a></li>
                        <li><a href="profile.html">Coporate News</a></li>
                        <li><a href="profile.html">Investors</a></li>
                    </ul>
                </div>
                <div class="f-widget widget-3">
                    <h4 class="w-title">Online Shop</h4>
                    <ul class="f-menu">
                        <li><a href="author.html">Website design</a></li>
                        <li><a href="author.html">App Design</a></li>
                        <li><a href="author.html">Ui/Ux Desgin</a></li>
                        <li><a href="author.html">Seo Marketing</a></li>
                    </ul>
                </div>
                <div class="f-widget widget-4">
                    <h4 class="w-title">Market Analysis</h4>
                    <p>Save time with preconfigured find to a environments that alreadyintod.</p>
                    <div class="footer-stats">
                        <div class="s-stat">
                            <h4 class="counter-number-lg">333313</h4>
                            <p>Item sold</p>
                        </div>
                        <div class="s-stat">
                            <h4 class="counter-number-lg">5344322313</h4>
                            <p>Total Earnings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-stretch">
            <div class="f-copy-right">
                <div class="p-left">
                    <ul class="s-links">
                        <li>
                            <a href="https://www.facebook.com/QuomodoSoft"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/QuomodoSoft"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/QuomodoSoft"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                    </ul>
                    <p class="cr-text">©2022 Quomodosoft All rights reserved</p>
                </div>
                <div class="p-right">
                    <a href="#">
                        <img src="{{ asset('assets/images/thumbs/p-gateway-img.png') }}" alt />
                    </a>
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
    <script>
        function openModal() {
            document.getElementById('simpleModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('simpleModal').style.display = "none";
        }

        // Show modal if success message exists
        @if (session('success'))
            openModal();
        @endif
    </script>
</body>

</html>
