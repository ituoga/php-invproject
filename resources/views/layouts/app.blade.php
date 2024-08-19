<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>

    <meta name="theme-color" content="#0d085c" />
    <link rel="manifest" href="/manifest.json" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/js/app.js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


    <title>{{ config('app.name', 'P6') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    {{--
    FIXIT: font-ende padaryti stiliu input type=select. Yra 2 selectionai Tasko formoje.
    --}}



    <link rel="stylesheet" href="{{ url('/8ylt-css/css/style.min.css?' . rand(999, 999999999)) }}" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">

    <style type="text/css">
        a {
            text-decoration: none;
            color: black;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
        .text-red {
            color: red;
        }
    </style>


@stack('styles')

</head>

<body>
    <div class="wrapper clearfix">

        <header class="header">

            <a href="#site-menu" class="site-menu hidden-sm hidden-xl js-dropdown-link" aria-label="navigacija"
                aria-expanded="false" aria-controls="site-menu" id="site-menu-header"><i class="icon-menu"
                    aria-hidden="true"></i></a>

            <a href="{{ url('/') }}" class="site-logo" aria-label="8y.lt logo"><img src="{{ url('/images/logo.svg') }}"
                    alt=""></a>


            <nav class="nav-user">
                <ul class="nav-user__list">
{{--                    @dd(app()->getLocale())--}}
                    @if(app()->getLocale() == "lt")
                        <li class="nav-user__items"><a href="{{ url("/set-lang?lang=en") }}" class="nav-user__links"><i class="icon-user" aria-hidden="true"></i><span class="hidden-xs">EN</span></a></li>
                    @else
                        <li class="nav-user__items"><a href="{{ url("/set-lang?lang=lt") }}" class="nav-user__links"><i class="icon-user" aria-hidden="true"></i><span class="hidden-xs">LT</span></a></li>
                    @endif
                    <li class="nav-user__items"><a href="{{ route("profile.edit") }}" class="nav-user__links"><i class="icon-user" aria-hidden="true"></i><span class="hidden-xs">Profilis</span></a></li>
                    <li class="nav-user__items">
                        <a href="{{ url("/logout") }}" class="nav-user__links"><i class="icon-user" aria-hidden="true"></i><span class="hidden-xs">Atsijungti</span></a>
                        <!-- Authentication -->
                        {{-- <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                if (confirm('Ar tikrai norite atsijungti?')) {
                  this.closest('form').submit();
                }" class="nav-user__links">
                                <i class="icon-logout" aria-hidden="true"></i><span class="hidden-xs">Atsijungti</span>
                            </a>
                        </form> --}}
                    </li>
                </ul>
            </nav>

        </header>

        <main class="body">

            <aside class="aside js-dropdown" aria-labelledby="site-menu-header" id="site-menu">

                <div class="m-b-20 hidden-sm hidden-xl clearfix">
                    <a href="#site-menu" class="site-close fr js-dropdown-link"><i class="icon-close"
                            aria-hidden="true"></i></a>
                </div>

                <!-- <h6 class="text-uppercase">Bendrieji įrankiai</h6> -->

                <nav class="nav-main">
                    <ul class="nav-main__list" style="padding-left:0px;">


                        <li class="nav-main__items">
                            <a href="{{ url('/') }}"
                                class="nav-main__links {{ request()->is('dashboard') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-home" aria-hidden="true"></i>{{__("Pradžia")}}</a>
                        </li>

                        <li class="nav-main__items">
                            <a href="{{ route('invoices.index') }}"
                                class="nav-main__links {{ request()->is('invoices*') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-list" aria-hidden="true"></i>{{__("Sąskaitos")}}</a>
                        </li>
                        <li class="nav-main__items">
                            <a href="{{ route('contrahents.index') }}"
                                class="nav-main__links {{ request()->is('contrahents*') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-person-plus" aria-hidden="true"></i>{{__("Klientai")}}</a>
                        </li>
                        <li class="nav-main__items">
                            <a href="{{ route('products.index') }}"
                                class="nav-main__links {{ request()->is('products*') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-calendar" aria-hidden="true"></i>{{__("Produktai")}}</a>
                        </li>


                    </ul>
                </nav>

            </aside>

            <section class="content container-fluid">

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom: 0; padding-bottom: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}

            </section>

        </main>

        <footer class="footer hidden-sm hidden-xl">

            <nav class="nav-bottom">
                <ul class="nav-bottom__list">
                    <li class="nav-bottom__items"><a href="{{ url('/') }}" class="nav-bottom__links "><i
                                class="icon-home" aria-hidden="true"></i>{{__("Pradžia")}}</a></li>
                    <li class="nav-bottom__items"><a href="{{ route('contrahents.index') }}"
                            class="nav-bottom__links"><i class="icon-calendar" aria-hidden="true"></i>{{__("Kontrahentai")}}</a>
                    </li>
                    <li class="nav-bottom__items"><a href="{{ route('invoices.create') }}" class="nav-bottom__links"><i
                                class="icon-calendar-plus" aria-hidden="true"></i>{{__("Išrašyti SF")}}</a></li>
                    <li class="nav-bottom__items"><a href="{{ route('products.index') }}" class="nav-bottom__links"><i
                                class="icon-list" aria-hidden="true"></i>{{__("Produktai")}}</a></li>
                </ul>
            </nav>

        </footer>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">




    <script src="{{ url('8ylt-css/js/locale/datepicker-lt.js') }}"></script>




    @include('layouts.scripts')

    {{-- <script src="https://unpkg.com/htmx.org@1.9.12"></script> --}}

    <script src="{{ url('8ylt-css/js/main.js?' . rand(999, 999999999)) }}"></script>

    @stack('scripts')


</body>

</html>
