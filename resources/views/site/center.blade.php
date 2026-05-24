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
    <title>{{ $center->center_name ?? 'Clinic' }} | Midmap</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0; top: 0;
            width: 100%; height: 100%;
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
        .close-btn { color: #aaa; font-size: 28px; font-weight: bold; float: right; cursor: pointer; }
        .close-btn:hover { color: black; }
 
        /* Rating Stars */
        .star-rating { display: flex; gap: 5px; margin: 10px 0; }
        .star-rating i { font-size: 20px; color: #ffc107; }
        .star-rating i.empty { color: #ddd; }
        .rating-form label { margin-right: 5px; cursor: pointer; }
        .rating-form input[type="radio"] { margin-right: 3px; }
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
                        <button id="m-nav-open"><i class="fa-solid fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
    <aside id="m-nav-container">
        <div class="m-nav-inner">
            <button id="m-nav-close"><i class="fa-sharp fa-solid fa-xmark"></i></button>
            <div class="logo"><img src="{{ asset('assets/images/logos/a1.PNG') }}" alt /></div>
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
 
    <section class="profile-banner-s1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="profile-banner-inner">
                        <div class="thumb">
                            <img src="{{ asset('storage/files/' . $center->center_logo ?? '') }}" alt />
                        </div>
                        <div class="content">
                            <h1 class="name">{{ $center->center_name ?? '' }}</h1>
                            <ul class="catagories">
                                <p>{{ $center->center_address ?? '' }}</p>
                            </ul>
                            <div class="rating">
                                {{-- عرض النجوم --}}
                                @php
                                    $avg = round($center->ratings()->avg('rating') ?? 0);
                                    $count = $center->ratings()->count();
                                @endphp
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $avg)
                                            <i class="fa-solid fa-star" style="color:#ffc107"></i>
                                        @else
                                            <i class="fa-regular fa-star" style="color:#ddd"></i>
                                        @endif
                                    @endfor
                                    <span style="margin-left:8px; color:#fff">{{ number_format($avg, 1) }} ({{ $count }} ratings)</span>
                                </div>
                                <div class="rating-text">
                                    <p>{{ $center->phone ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="shapes">
                            <ul class="animated-boxes-l animated-boxes">
                                <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                            </ul>
                            <ul class="animated-boxes-r animated-boxes">
                                <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <section class="profile-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="profile-tab-links">
                        <div class="tab-links" data-links-for="profile-tabs" style="max-width: 600px;">
                            <button class="tab-btn active" data-tab="overview">
                                <span class="icon"><i class="fa-solid fa-layer-group"></i></span>
                                <span class="text">Overview</span>
                            </button>
                            <button class="tab-btn" data-tab="portfolio">
                                <span class="icon"><i class="fa-solid fa-box"></i></span>
                                <span class="text">Services</span>
                            </button>
                            <button class="tab-btn" data-tab="file">
                                <span class="icon"><i class="fa-solid fa-file"></i></span>
                                <span class="text">Book an Appointment</span>
                            </button>
                        </div>
                    </div>
                </div>
 
                <div class="col-lg-8">
                    <div class="profile-tab">
                        <div class="tab tab-s1" id="profile-tabs">
                            <div class="tab-contents">
 
                                {{-- Overview Tab --}}
                                <div class="tab-pane active" id="overview">
                                    <div class="tab-p-inner">
                                        <div class="overview">
                                            <div>{!! $center->overview ?? '' !!}</div>
                                        </div>
 
                                        {{-- Rating Section --}}
                                        <div class="mt-4" style="border-top: 1px solid #eee; padding-top: 20px;">
                                            <h4>Clinic Rating</h4>
                                            <div class="star-rating mb-3">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $avg)
                                                        <i class="fa-solid fa-star" style="color:#ffc107; font-size:22px"></i>
                                                    @else
                                                        <i class="fa-regular fa-star" style="color:#ddd; font-size:22px"></i>
                                                    @endif
                                                @endfor
                                                <span class="ml-2">{{ number_format($avg, 1) }} ({{ $count }} ratings)</span>
                                            </div>
 
                                            <form method="POST" action="{{ route('rating.store') }}" class="rating-form">
                                                @csrf
                                                <input type="hidden" name="center_id" value="{{ $center->id }}" />
                                                <p>Choose the number of stars:</p>
                                                <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap; margin-bottom:15px;">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <label>
                                                            <input type="radio" name="rating" value="{{ $i }}" required />
                                                            {{ $i }} <i class="fa-solid fa-star" style="color:#ffc107"></i>
                                                        </label>
                                                    @endfor
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit Rating</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
 
                                {{-- Services Tab --}}
                                <div class="tab-pane" id="portfolio">
                                    <div class="tab-p-inner">
                                        <div class="portfolio">
                                            @foreach ($center->services as $service)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="pro-box-s1">
                                                        <div class="content">
                                                            <h4 class="p-title">{{ $service->name ?? '' }}</h4>
                                                            <p class="p-meta">{{ $service->description ?? '' }}</p>
                                                            <div class="download-rating-wrap">
                                                                <div class="p-left">
                                                                    <a href="#" class="d-btn">
                                                                        <span class="sale-count">{{ $service->duration ?? '' }}</span>
                                                                        <i class="fa-solid fa-clock"></i>
                                                                        {{ $service->price }} {{ $center->currency->name ?? '' }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
 
                                {{-- Book Appointment Tab --}}
                                <div class="tab-pane" id="file">
                                    <div class="tab-p-inner">
                                        <div class="file">
                                            <form method="POST" action="{{ route('site.order') }}" class="form">
                                                @csrf
                                                <input type="hidden" name="center_id" value="{{ $center->id }}" />
 
                                                <div class="s-input">
                                                    <label for="name">Name*</label>
                                                    <input id="name" class="block mt-1 w-full" type="text" name="name"
                                                        value="{{ old('name') }}" required placeholder="Your Name" />
                                                    @error('name')<span style="color:red">{{ $message }}</span>@enderror
                                                </div>
 
                                                <div class="s-input">
                                                    <label for="email">Email (Optional)</label>
                                                    <input id="email" class="block mt-1 w-full" type="email" name="email"
                                                        value="{{ old('email') }}" placeholder="Your Email" />
                                                    @error('email')<span style="color:red">{{ $message }}</span>@enderror
                                                </div>
 
                                                <div class="s-input">
                                                    <label for="phone">Phone*</label>
                                                    <input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                                        value="{{ old('phone') }}" required placeholder="Your Phone Number" />
                                                    @error('phone')<span style="color:red">{{ $message }}</span>@enderror
                                                </div>
 
                                                <div class="input-grp row">
                                                    <div class="s-input col-3">
                                                        <label>Service (Optional)</label>
                                                        <select class="block mt-1 w-full" name="service_id">
                                                            <option value="" disabled selected>Select service</option>
                                                            @foreach ($center->services as $servic)
                                                                <option value="{{ $servic->id }}" {{ old('service_id') == $servic->id ? 'selected' : '' }}>
                                                                    {{ $servic->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="s-input col-3">
                                                        <label>Gender (Optional)</label>
                                                        <select class="block mt-1 w-full" name="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                        @error('gender')<span style="color:red">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
 
                                                <div class="s-input">
                                                    <label for="appointment_date">Appointment Date (Optional)</label>
                                                    <input id="appointment_date" class="block mt-1 w-full" type="date"
                                                        name="appointment_date" value="{{ old('appointment_date') }}" />
                                                    @error('appointment_date')<span style="color:red">{{ $message }}</span>@enderror
                                                </div>
 
                                                <div class="s-input">
                                                    <label for="notes">Notes (Optional)</label>
                                                    <textarea id="notes" class="block mt-1 w-full" name="notes" placeholder="Any additional notes">{{ old('notes') }}</textarea>
                                                    @error('notes')<span style="color:red">{{ $message }}</span>@enderror
                                                </div>
 
                                                <div class="f-bottom">
                                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
 
                            </div>
                        </div>
                    </div>
                </div>
 
                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <div class="profile-sidebar">
                        <div class="selling-info widget">
                            <h3 class="w-title">Category</h3>
                            <ul class="i-list-s2">
                                <li><span class="count">{{ $center->category->name ?? '' }}</span></li>
                            </ul>
                        </div>
                        <div class="personal-info widget">
                            <h3 class="w-title">Personal Info</h3>
                            <ul>
                                <li>
                                    <span class="field">Country</span>
                                    <span class="value">{{ $center->country->name ?? '' }}</span>
                                </li>
                                <li>
                                    <span class="field">City</span>
                                    <span class="value">{{ $center->city->name ?? '' }}</span>
                                </li>
                                <li>
                                    <span class="field">Member Since</span>
                                    <span class="value">{{ $center->created_at->format('M/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="socials widget">
                            <h3 class="w-title">Social Profile</h3>
                            <ul class="social-links">
                                <li>
                                    <a href="{{ $center->facebook_url ?? '#' }}">
                                        <img src="{{ asset('assets/images/icons/Facebook.png') }}" alt />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $center->youtube_url ?? '#' }}">
                                        <img style="width:45px;height:45px;border-radius:50%"
                                            src="{{ asset('assets/images/icons/whatsapp.jpg') }}" alt />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $center->instagram_url ?? '#' }}">
                                        <img style="width:45px;height:45px;border-radius:50%"
                                            src="{{ asset('assets/images/icons/insta.jpg') }}" alt />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $center->twitter_url ?? '#' }}">
                                        <img src="{{ asset('assets/images/icons/Twitter.png') }}" alt />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
    </section>
 
    <div id="simpleModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <p style="color:rgb(8,187,32)">{{ session('success') }}</p>
        </div>
    </div>
 
    <footer class="footer-s1 footer-s2">
        <div class="container">
            <div class="footer-m-wrap">
                <div class="f-widget widget-1">
                    <div class="logo"><img src="{{ asset('assets/images/logos/a1.PNG') }}" alt /></div>
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
    <script>
        function openModal() { document.getElementById('simpleModal').style.display = "block"; }
        function closeModal() { document.getElementById('simpleModal').style.display = "none"; }
        @if(session('success')) openModal(); @endif
    </script>
</body>
</html>