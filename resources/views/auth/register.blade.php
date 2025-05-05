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
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
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
                                <img src="{{ asset('assets/images/logos/logo-blue.svg')}}" alt />
                            </a>
                        </div>
                        <div class="m-logo">
                            <a href="/">
                                <img src="{{ asset('assets/images/logos/m-logo.svg')}}" alt />
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
                                    <a href="{{route('site.centers')}}">Centers</a>
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
                <img src="{{ asset('assets/images/logos/logo-blue.svg')}}" alt />
            </div>
            <ul class="main-nav">

                <li><a href="\">Home</a></li>
                <li><a href="{{route('site.centers')}}">Centers</a></li>
                <li><a href="\">Blog</a></li>
                <li><a href="#Contact">Contact</a></li>
            </ul>
        </div>
    </aside>


    <section class="signup-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-main__form">
                        <form method="POST" action="{{ route('register') }}" class="form">
                            @csrf

                            <h3 class="frm-header">Create Account</h3>
                            <div class="inner-wrap">

                                <!-- First Name and Last Name -->
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label for="name">Name*</label>
                                        <input id="name" class="block mt-1 w-full" type="text" name="name"
                                            value="{{ old('name') }}" required autofocus placeholder="First Name" />
                                        @error('name')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="s-input">
                                        <label for="email">Email*</label>
                                        <input id="email" class="block mt-1 w-full" type="text" name="email"
                                            value="{{ old('email') }}" required placeholder="email" />
                                        @error('email')
                                            <span style="color: red" class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Username -->


                                <div class="input-grp">
                                    <!-- Password -->
                                    <div class="s-input">
                                        <label for="password">Password*</label>
                                        <input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required placeholder="********" />
                                        @error('password')
                                            <span style="color: red" class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="s-input">
                                        <label for="password_confirmation">Confirm Password*</label>
                                        <input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required placeholder="********" />
                                        @error('password_confirmation')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Clinic Name -->
                                <div class="s-input">
                                    <label for="clinic_name">Clinic Name*</label>
                                    <input id="clinic_name" class="block mt-1 w-full" type="text"
                                        name="clinic_name" value="{{ old('clinic_name') }}" required
                                        placeholder="Clinic Name" />
                                    @error('clinic_name')
                                        <span class="text-red-500 mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-grp row">
                                    <!-- Category (Select) -->
                                    <div class="s-input col-4">
                                        @php
                                            $categories = App\Models\Category::active()->get();
                                        @endphp
                                        <select id="category" class="block mt-1 w-full" name="category_id" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Country (Select) -->
                                    <div class="s-input col-4">
                                        <select id="country" class="block mt-1 w-full" name="country_id" required>
                                            <option value="" disabled selected>Select Country</option>
                                            @php
                                                $countries = App\Models\Country::active()->get();
                                            @endphp
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- City (Select) -->
                                    <div class="s-input col-4">
                                        <div id="city"  >
                                        </div>
                                        @error('city_id')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label for="address">Address*</label>
                                        <input id="address" class="block mt-1 w-full" type="text"
                                            name="address" value="{{ old('address') }}" required
                                            placeholder="Clinic Address" />
                                        @error('address')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="s-input">
                                        <label for="phone">Phone*</label>
                                        <input id="phone" class="block mt-1 w-full" type="text"
                                            name="phone" value="{{ old('phone') }}" required
                                            placeholder="Clinic Phone" />
                                        @error('phone')
                                            <span class="text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Remember Me & Forgot Password -->
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button and Social Login -->
                                <div class="f-bottom">
                                    <button class="btn btn-s2 btn-lg" type="submit">Create Account</button>
                                    <button class="btn btn-lg google">
                                        <img src="assets/images/icons/google-logo.svg" alt="Google Logo">
                                        Sign in With Google
                                    </button>
                                    <p>Already have an Account? <a href="{{ route('login') }}">Log In</a></p>
                                </div>
                            </div>
                        </form>

                    </div>
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
document.getElementById('country').onchange = function() {
        var countryId = this.value;

        if(countryId) {
            // إرسال طلب AJAX لجلب المدن الخاصة بالدولة
            fetch(`/get-cities/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    var citySelect = document.getElementById('city');
                    var cityDiv = document.getElementById('city');  // الحصول على الـ div
        cityDiv.innerHTML = '';  // إفراغ الـ div من أي محتوى سابق (إن وجد)

        // التأكد من وجود المدن
        if (data.cities && data.cities.length > 0) {
            // إنشاء عنصر select جديد
            var citySelect = document.createElement('select');
            citySelect.classList.add('nice-select', 'mt-1', 'w-full'); // إضافة الـ classes لـ select
            citySelect.name = 'city_id'; // تعيين اسم الحقل لـ select
            citySelect.required = true;

            // إضافة الخيار الافتراضي
            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.textContent = 'Select City';
            citySelect.appendChild(defaultOption);

            // إضافة المدن التي تم جلبها
            data.cities.forEach(function(city) {
                var option = document.createElement('option');
                option.value = city.id;
                option.textContent = city.name;
                citySelect.appendChild(option);
            });

            // إضافة الـ select الجديد إلى الـ div
            cityDiv.appendChild(citySelect);

        } else {
            console.log('No cities available for this country.');
        }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            // في حالة عدم اختيار دولة، إفراغ خيارات المدن
            document.getElementById('city').innerHTML = '<option value="" disabled selected>Select City</option>';
        }
    } ;
    </script>
</body>

</html>
