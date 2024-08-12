<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>

    <body class="login">

        <div class="wrapper clearfix">
        
        <main class="body">
        
            <section class="login-block">
        
            <div class="container-fluid gx-0">
        
                <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="{{ url('/login') }}" class="site-logo" aria-label="8y.lt logo"><img src="{{ url('images/logo.svg') }}" alt=""></a>
                </div>
                </div>
        
                <div class="row gx-0">
                <div class="col-12 col-md-6 col-xl-8 login-block__image hidden-xs"></div>
                <div class="col-12 col-md-6 col-xl-4 login-block__form">

                    {{ $slot }}

                </div>
            </div>
        
            </div>
        
            </section>
        
        </main>
        
        </div>

    
</body>
    
</html>