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
    <title>Midmap | Register</title>
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
                        <form method="POST" action="{{ route('register') }}" class="form">
                            @csrf
                            <h3 class="frm-header">Create Account</h3>
                            <div class="inner-wrap">
 
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label for="name">Name*</label>
                                        <input id="name" class="block mt-1 w-full" type="text" name="name"
                                            value="{{ old('name') }}" required autofocus placeholder="First Name" />
                                        @error('name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="s-input">
                                        <label for="email">Email*</label>
                                        <input id="email" class="block mt-1 w-full" type="text" name="email"
                                            value="{{ old('email') }}" required placeholder="email" />
                                        @error('email')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
 
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label for="password">Password*</label>
                                        <input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required placeholder="********" />
                                        @error('password')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="s-input">
                                        <label for="password_confirmation">Confirm Password*</label>
                                        <input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required placeholder="********" />
                                        @error('password_confirmation')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
 
                                <div class="s-input">
                                    <label for="clinic_name">Clinic Name*</label>
                                    <input id="clinic_name" class="block mt-1 w-full" type="text"
                                        name="clinic_name" value="{{ old('clinic_name') }}" required
                                        placeholder="Clinic Name" />
                                    @error('clinic_name')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
 
                                <div class="input-grp row">
                                    <div class="s-input col-4">
                                        @php $categories = App\Models\Category::active()->get(); @endphp
                                        <select id="category" class="block mt-1 w-full" name="category_id" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
 
                                    <div class="s-input col-4">
                                        @php $countries = App\Models\Country::active()->get(); @endphp
                                        <select id="country" class="block mt-1 w-full" name="country_id" required>
                                            <option value="" disabled selected>Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
 
                                    <div class="s-input col-4">
                                        <div id="city"></div>
                                        @error('city_id')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
 
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label for="address">Address*</label>
                                        <input id="address" class="block mt-1 w-full" type="text"
                                            name="address" value="{{ old('address') }}" required
                                            placeholder="Clinic Address" />
                                        @error('address')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="s-input">
                                        <label for="phone">Phone*</label>
                                        <input id="phone" class="block mt-1 w-full" type="text"
                                            name="phone" value="{{ old('phone') }}" required
                                            placeholder="Clinic Phone" />
                                        @error('phone')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
 
                                <div class="input-grp">
                                    <div class="s-input">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
 
                                <div class="f-bottom">
                                    <button class="btn btn-s2 btn-lg" type="submit">Create Account</button>
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
    <script>
        document.getElementById('country').onchange = function() {
            var countryId = this.value;
            if (countryId) {
                fetch(`/get-cities/${countryId}`)
                    .then(response => response.json())
                    .then(data => {
                        var cityDiv = document.getElementById('city');
                        cityDiv.innerHTML = '';
                        if (data.cities && data.cities.length > 0) {
                            var citySelect = document.createElement('select');
                            citySelect.classList.add('nice-select', 'mt-1', 'w-full');
                            citySelect.name = 'city_id';
                            citySelect.required = true;
                            var defaultOption = document.createElement('option');
                            defaultOption.value = '';
                            defaultOption.disabled = true;
                            defaultOption.selected = true;
                            defaultOption.textContent = 'Select City';
                            citySelect.appendChild(defaultOption);
                            data.cities.forEach(function(city) {
                                var option = document.createElement('option');
                                option.value = city.id;
                                option.textContent = city.name;
                                citySelect.appendChild(option);
                            });
                            cityDiv.appendChild(citySelect);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('city').innerHTML = '';
            }
        };
    </script>
</body>
</html>