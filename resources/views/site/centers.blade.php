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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <title>Midmap | Clinics</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }
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
 
    <section class="page-banner-s1">
        <div class="container">
            <div class="row">
                <div class="p-banner-inner">
                    <h1 class="s-title">Clinics</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('site.show') }}">Home</a></li>
                        <li><a href="#">Clinics Page</a></li>
                    </ul>
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
 
    <section class="p-archive-main">
        <div class="container">
            <form action="{{ route('site.centers') }}">
                @csrf
                <div class="row p-search-cat">
                    <div class="col-md-3 d-flex justify-end">
                        <select class="p-catagories" name="city_id">
                            <option value="">All Cities</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex justify-end">
                        <select class="p-catagories" name="category_id">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="s-bar-s2">
                            <div class="s-bar-inner">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search your products..." />
                                <button type="submit" class="btn btn-frm">
                                    <i class="fa-solid fa-magnifying-glass"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
 
            <div id="map" style="height: 400px; margin: 20px 0; z-index: 1;"></div>
 
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
                                            By <a class="author">{{ $center->user->name }}</a> In
                                            <a href="{{ route('site.centers', ['category_id' => $center->category->id]) }}" class="catagory">{{ $center->category->name }}</a>
                                        </p>
                                        <h4 class="p-title">
                                            <a href="{{ route('site.center', $center->id) }}">{{ $center->center_name }}</a>
                                        </h4>
                                        <div class="download-rating-wrap">
                                            <div class="p-meta">
                                                <a class="author">{{ $center->country->name }}</a> /
                                                <a href="{{ route('site.centers', ['city_id' => $center->city->id]) }}" class="catagory">{{ $center->city->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                        Subscribe to get the latest themes, templates, Photos, Audio and offer information. Don't worry, we won't send spam!
                    </p>
                    <div class="subs-form-s1" data-aos="fade-up" data-aos-delay="50">
                        <input type="text" placeholder="Enter your email address" />
                        <button class="btn-frm" type="submit">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="footer-m-wrap">
                <div class="f-widget widget-1">
                    <div class="logo">
                        <img src="{{ asset('assets/images/logos/a1.PNG') }}" alt />
                    </div>
                    <ul class="f-menu">
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Delivery & Returns</a></li>
                        <li><a href="#">Warranty</a></li>
                    </ul>
                </div>
                <div class="f-widget widget-2">
                    <h4 class="w-title">About us</h4>
                    <ul class="f-menu">
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Work With Us</a></li>
                        <li><a href="#">Corporate News</a></li>
                        <li><a href="#">Investors</a></li>
                    </ul>
                </div>
                <div class="f-widget widget-3">
                    <h4 class="w-title">Services</h4>
                    <ul class="f-menu">
                        <li><a href="#">Medical Booking</a></li>
                        <li><a href="#">Clinic Management</a></li>
                        <li><a href="#">Patient Records</a></li>
                        <li><a href="#">Appointments</a></li>
                    </ul>
                </div>
                <div class="f-widget widget-4">
                    <h4 class="w-title">Market Analysis</h4>
                    <p>Save time with preconfigured environments that are already set up for you.</p>
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
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                    <p class="cr-text">©2024 Midmap All rights reserved</p>
                </div>
                <div class="p-right">
                    <a href="#"><img src="{{ asset('assets/images/thumbs/p-gateway-img.png') }}" alt /></a>
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
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        function openModal() {
            document.getElementById('simpleModal').style.display = "block";
        }
        function closeModal() {
            document.getElementById('simpleModal').style.display = "none";
        }
        @if(session('success'))
            openModal();
        @endif
 
        // Leaflet Map
        var map = L.map('map').setView([31.5, 34.5], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
 
        var centers = @json($centers);
        centers.forEach(function(center) {
            if (center.latitude && center.longitude) {
                var marker = L.marker([center.latitude, center.longitude]).addTo(map);
                marker.bindPopup('<b>' + center.center_name + '</b><br><a href="/center/' + center.id + '">View Details</a>');
            }
        });
    </script>
</body>
</html>