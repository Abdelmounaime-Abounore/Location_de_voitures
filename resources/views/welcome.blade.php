<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url(images/body-bg.jpg);
                background-size: cover; 
                color: white;

            }
            .div-img img {                
                height:85px; 
                width:80px;
                background-color: rgb(0 0 0 / 29%);
                border-radius: 30%;
            }
            .nav-links {
                height:90px;
            }
            .nav-links a {
                font-weight: bold;
                border-radius: 3px;
            }
            .nav-links a:hover {
                background-color: yellow;
            }
            .cover{
                margin: auto;
                margin-top: 20px;
                height: 370px;
                width: 90%;
                background-image: url(images/landing-page.png);
                background-color: black;
                background-size: cover;
                background-position: center;
                border-radius: 10px;
            }
            .line {
                width: 50px; 
                height: 6px; 
                background-color: #5a0bf7; 
                margin: 20px 0; 
            }

            .about {
                margin-top: 70px;
            }
            .about-img {
                height: 70%;
                border-radius: 8px;
            }
            .register-link {
                font-size: 24px;
                border-radius: 7px;
                background-color: rgb(115, 195, 115);
            }
            .register-link:hover {
                background-color: yellow;
            }
        </style>
    </head>
    <body class="antialiased">
        {{-- <div class="flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="height: 10px"> --}}
        <div class="d-flex justify-content-between" style="width: 95%; margin:auto;">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="div-img">
                    <img src="images/logo.png" alt="Logo" class="p-1">
                </div>
                @if (Route::has('login'))
                    <div class="nav-links hidden top-0 right-0 px-6 d-flex align-items-center">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-white-500 text-decoration-none p-2">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-white-500 text-decoration-none p-2">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-white-500 text-decoration-none p-2">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </a> 
        </div>
        <div class="cover d-flex flex-column justify-content-center align-items-center text-center">
            <h1 class="text-light font-weight-bold">Castilla Car Rental</h1>
            <div class="line"></div>
            <h3 class="text-light">Car rental agency in Tangier, offering convenient services at affordable prices</h3>
        </div>
        <div class="about d-flex flex-column justify-content-end flex-lg-row justify-content-between w-75 mx-auto" style="margin-bottom: 10px">
            <div class="w-100 px-5 mb-4 mb-lg-0 m-auto" style="background-color: gray; border-radius: 6px; opacity: 70%">
                <h1>About</h1>
                <div class="line"></div>
                <p>
                    We are Castilla Car Rent in Tangier-Morocco most distinguished rental car company.
                    As we are not affiliated with any specific automaker, we are able to provide a variety of vehicle makes and models for customers to rent.
                    Rather than let vehicles age, we also replace our most popular passenger vehicles every few years.
                    Replacing used vehicles eliminates uncomfortable wear and tear, and reduces the risk of breakdown and other inconveniences to our customers.
                </p>
            </div>
            <div class="w-100 px-5 my-5">
                <img src="images/about.jpg" alt="about.jpg" class="about-img w-100">
            </div>
        </div>
        <div class="my-5">
            <div class="my-5">
                <div class="text-center" style="margin-bottom: 20px;">
                    <h2>Services</h2>
                </div>
                <div class="line mx-auto"></div>
            </div>
            <div class=" d-flex flex-column justify-content-center flex-md-row justify-content-between w-75 m-auto text-info">
                <div class="bg-light mx-3 my-3 p-3" style="border-radius: 7px">
                    <p> You can book a rental car before embarking on your trip to this beautiful country. We compare offers from different rental agencies in Morocco and find the best rates for rental cars</p>
                </div>
                <div class="bg-light mx-3 my-3 p-3" style="border-radius: 7px">
                    <p> Castilla Car rental companies are always ready to help you choose the perfect car for your itinerary. Our booking engine finds the lowest prices from most car rental providers</p>
                </div>
                <div class="bg-light mx-3 my-3 p-3" style="border-radius: 7px">
                    <p> For easy transport around the country, car rental offers safe and efficient travel While at it, travelers will sample the amazing cuisine in Morocco’s finest hotels and restaurants.</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center my-5 mx-4">
            <div class="bg-primary p-2" style="margin-bottom: 20px; opacity:50%; border-radius: 7px">
                <h2>Create Your Account, and Rent your best Car</h2>
            </div>
            @if (!Auth()->user())
                <div>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-white-500 text-decoration-none p-2 register-link">Register</a>
                </div>
            @endif
        </div>
    </body>
</html>
