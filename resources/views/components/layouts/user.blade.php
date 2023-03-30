<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoes</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

</head>


<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="d-flex border-bottom p-2">

            <div class="flex-grow-1">
                <a href="{{ route('welcome') }}">
                    <img src="{{ URL::asset('build/assets/LogoShoes.png') }}" class="" style="max-width: 8%">
                </a>
            </div>


            <div class="d-flex">
                <form action="{{ route('user.products.index') }}" class="flex-grow-1 d-flex">
                    <div class="flex-grow-1 p-1">
                        <input type="text" class="form-control" placeholder="Search" name="search"
                            value="{{ request()->input('search') }}">
                    </div>
                    <div class="p-1">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-end">
                <a href="{{ route('user.wishlists.index') }}" style="color: black; text-decoration:none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </a>
                <a href="{{ route('user.carts.index') }}" style="color:black;text-decoration: none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </a>
                <a href="{{ route('profile.edit') }}" style="color:black;text-decoration: none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
            </div>



            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div>
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                        this.closest('form').submit();" style="color:black;text-decoration: none"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                        </a>
                    </div>
                </form>
            @else
                <a href="{{ route('login', ['redir' => request()->fullUrl()]) }}" class="">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register', ['redir' => request()->fullUrl()]) }}" class="">Register</a>
                @endif
            @endauth
        </div>

        <div class="min-height:30em">
            {{ $slot }}
        </div>


    </div>
</body>
<footer class="mt-auto">
    <div class="border-top bg-dark text-light">
        <h1>Footer</h1>
    </div>
</footer>

</html>
