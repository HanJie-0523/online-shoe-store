<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4 border">
                    <div class="p-5">
                        <div class="text-center">
                            <h3>Login</h3>
                        </div>
                        <form method="POST" action="{{ route('login', ['redir' => request()->input('redir')]) }}">
                            @csrf


                            <!-- Email Address -->
                            <div>
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" :value="old('email')"
                                    class="form-control" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <label class='form-label' for="password">Password:</label><br>
                                <input class="form-control" type="password" id="password" name="password" required><br>
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            {{-- <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                            {{-- <x-primary-button class="ml-3">
                {{ __('Log in') }}
                </x-primary-button> --}}


                            <div class="form-group row mb-0 mt-3">
                                <button class="btn btn-primary" type="submit">Login</button>

                                    {{-- <a href="/auth/github/redirect" class="btn"> --}}
                                    <a href="{{ route('auth.github', ['redir' => request()->input('redir')]) }}"
                                        class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                        </svg> Login With Github
                                    </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
{{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
