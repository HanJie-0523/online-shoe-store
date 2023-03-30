<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin</title>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="mb-3">
            <div class="d-flex border-bottom p-2">
                <div class="flex-grow-1"><img src="{{ URL::asset('build/assets/LogoShoes.png') }}" class=""
                        style="max-width: 8%">
                </div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="col">
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">Log Out</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-2 border-right" style="min-height:30em">
                <div class="nav flex-column">
                    <div class="nav-item py-1">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">Products</a>
                    </div>
                    <div class="nav-item py-1">
                        <a href="{{ route('admin.orders.index')}}" class="nav-link">Orders</a>
                    </div>
                    <div class="nav-item py-1">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">Users</a>
                    </div>
                </div>
            </div>


            <div class="col">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
