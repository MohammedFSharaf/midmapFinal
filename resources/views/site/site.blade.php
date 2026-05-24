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
 
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css')}}" />
    <script src="{{ asset('assets/js/preloader.js')}}"></script>
 
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/nice-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
    <title>Midmap</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
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
                            <a href="/">
                                <img src="{{ asset('assets/images/logos/a1.PNG')}}" alt />
                            </a>
                        </div>
                        <div class="m-logo">
                            <a href="/">
                                <img src="{{ asset('assets/images/logos/a1.PNG')}}" alt />
                            </a>
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
                <img src="{{ asset('assets/images/logos/a1.PNG')}}" alt />
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
 
    <section class="hero-s2 s-padding">
        <div class="container-stretch">
            <div class="row">
                <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                    <div class="hero-s2__content">
                        <h1 class="h-title">Top-level healthcare services.</h1>
                        <p class="h-desc">
                            A specialized medical team at your service with professionalism.
                        </p>
                        <form action="{{ route('site.centers') }}">
                            @csrf
                            <div class="s-bar-s1 accent-lightBlue">
                                <div class="s-bar-inner">
                                    <div class="p-left">
                                        <select name="category_id">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="search" placeholder="Search the right clinic for..." />
                                    </div>
                                    <div class="p-right">
                                        <button type="submit" class="btn-frm-s2">
                                            <i class="fa-solid fa-magnifying-glass"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="counter-sm">
                            <div class="s-counter">
                                <p class="number">
                                    <span class="counter-number">34</span><span class="s-fix">k+</span>
                                </p>
                                <p class="text">clinic</p>
                            </div>
                            <div class="s-counter">
                                <p class="number">
                                    <span class="counter-number">243</span><span class="s-fix">k+</span>
                                </p>
                                <p class="text">User</p>
                            </div>
                        </div>
                        <img class="shape" src="{{ asset('assets/images/shapes/hero-2-sm.png')}}" alt />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="hero-s2__thumb">
                        <img src="{{ asset('assets/images/a2.PNG')}}" alt />
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="{{ asset('assets/images/shapes/hero-2.png')}}" alt />
        </div>
    </section>
 
    <section class="s-padding catagories-sec-s1 accent-lightBlue">
        <div class="container">
            <div class="s-title-wrap">
                <p class="s-sub-title">Save time with software.</p>
                <h2 class="s-title">Browse Best Categories</h2>
            </div>
            <div class="row">
                <div class="catagories-sec-inner">
                    @foreach ($categories as $catego)
                        <div class="i-box-s2" data-aos="fade-up">
                            <div class="thumb">
                                <img src="{{ asset('storage/files/' . ($catego->image ?? 'default.png')) }}" alt />
                            </div>
                            <div class="content">
                                <h3>{{ $catego->name }}</h3>
                                <a href="{{ route('site.centers', ['category_id' => $catego->id]) }}" class="f-btn">View All<i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
 
    <section class="product-gallery-s1 accent-lightBlue s-padding">
        <div class="container">
            <div class="s-title-wrap">
                <p class="s-sub-title">Save time with software.</p>
                <h2 class="s-title">A specialized medical team at your service with professionalism.</h2>
            </div>
            <div class="row">
                @foreach ($centers as $center)
                    <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="pro-box-s1">
                            <div class="thumb">
                                <img src="{{ asset('storage/files/' . $center->center_logo ?? '') }}" alt />
                                <div class="purchas-preview-wrap">
                                    <a href="{{ route('site.center', $center->id) }}">Preview</a>
                                </div>
                            </div>
                            <div class="content">
                                <p class="p-meta">
                                    By<a class="author"> {{ $center->user->name }}</a> In
                                    <a href="{{ route('site.centers', ['category_id' => $center->category->id]) }}" class="catagory">{{ $center->category->name }}</a>
                                </p>
                                <h4 class="p-title"><a href="{{ route('site.center', $center->id) }}">{{ $center->center_name }}</a></h4>
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
                <div class="t-center view-all">
                    <a href="{{ route('site.centers') }}" class="btn btn-s3">View All</a>
                </div>
            </div>
        </div>
    </section>
 
    <section class="features-sec-s2 s-padding">
        <div class="container">
            <div class="s-title-wrap">
                <p class="s-sub-title">Save time with software.</p>
                <h2 class="s-title">Why Choose DigMak</h2>
            </div>
            <div class="row">
                <div class="feat-box-s1-wrap">
                    <div class="feat-box-s1" data-aos="fade-right">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/icons/feature1-icon1.svg')}}" alt />
                        </div>
                        <div class="content">
                            <h4>15 days Money Back guarantee</h4>
                        </div>
                    </div>
                    <div class="feat-box-s1" data-aos="fade-right" data-aos-delay="150">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/icons/feature1-icon2.svg')}}" alt />
                        </div>
                        <div class="content">
                            <h4>24/7 live Support & Forum Share</h4>
                        </div>
                    </div>
                    <div class="feat-box-s1" data-aos="fade-right" data-aos-delay="150">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/icons/feature1-icon3.svg')}}" alt />
                        </div>
                        <div class="content">
                            <h4>Outstanding Simplicity</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="{{ asset('assets/images/shapes/features2-1.png')}}" alt class="shp-1" />
            <img src="{{ asset('assets/images/shapes/features2-2.png')}}" alt class="shp-2" />
        </div>
    </section>
 
    <section class="cta-s2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content">
                        <h2 class="s-title">
                            <span class="t-light">Top-level healthcare services.</span>
                            A specialized medical team at your service with professionalism.
                        </h2>
                        <a href="{{ route('site.centers') }}" class="btn btn-s4">View all Clinics</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <section id="Contact" class="contact-main s-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="contact-main__info">
                        <h2 class="title">Contact Information</h2>
                        <p class="desc">
                            Fill the form below or write us. We will try our best to help you as soon as possible.
                        </p>
                        <div class="row">
                            <div class="contact-boxes-wrap">
                                <div class="c-box">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/icons/phone.svg') }}" alt />
                                    </div>
                                    <div class="content">
                                        <h3>Phone</h3>
                                        <p>+(323) 9847 3847 383</p>
                                        <p>+(434) 5466 5467 443</p>
                                    </div>
                                </div>
                                <div class="c-box">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/icons/email.svg') }}" alt />
                                    </div>
                                    <div class="content">
                                        <h3>Email</h3>
                                        <p>info@midmap.com</p>
                                        <p>support@midmap.com</p>
                                    </div>
                                </div>
                                <div class="c-box map">
                                    <div>
                                        <div class="box">
                                            <div class="icon">
                                                <img src="{{ asset('assets/images/icons/location.svg') }}" alt />
                                            </div>
                                            <div class="content">
                                                <h3>Address</h3>
                                                <p>4517 Washington Ave. Manchester, Road</p>
                                                <p>2342, Kentucky 39495</p>
                                            </div>
                                        </div>
                                        <div class="map-wrap">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14600.380994918401!2d90.3665415!3d23.8152118!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1dea3ec2f7a32054!2sQuomodoSoft!5e0!3m2!1sen!2sbd!4v1664687133594!5m2!1sen!2sbd"
                                                width="600" height="450" style="border:0;" allowfullscreen
                                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-main__form">
                        <form action="{{ route('contact.store') }}" method="POST" class="form">
                            @csrf
                            <h3 class="frm-header">Have Any Question</h3>
                            <div class="inner-wrap">
                                <div class="s-input">
                                    <label>Name*</label>
                                    <input type="text" name="name" placeholder="Your Name" />
                                </div>
                                <div class="s-input">
                                    <label>Email*</label>
                                    <input type="text" name="email" placeholder="Your Email" />
                                </div>
                                <div class="s-input">
                                    <label>Subject*</label>
                                    <input type="text" name="subject" placeholder="Subject" />
                                </div>
                                <div class="s-input">
                                    <label>Description*</label>
                                    <textarea name="description" placeholder="Type here.."></textarea>
                                </div>
                                <div class="f-bottom">
                                    <button class="btn btn-s2 btn-lg" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
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
                        <img src="{{ asset('assets/images/logos/a1.PNG')}}" alt />
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
                    <a href="#">
                        <img src="{{ asset('assets/images/thumbs/p-gateway-img.png')}}" alt />
                    </a>
                </div>
            </div>
        </div>
    </footer>
 
    <script src="{{ asset('assets/js/vendor/font-awesome.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/counterup.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/aos.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/gsap.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/scrollTrigger.min.js')}}"></script>
    <script src="{{ asset('assets/js/animations.js')}}"></script>
    <script src="{{ asset('assets/js/plugin.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
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
    </script>
</body>
</html>