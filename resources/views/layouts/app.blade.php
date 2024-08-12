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
        var baseUrlDay = "{{ url('/tasks/day/?date=') }}";
    </script>

    <meta name="theme-color" content="#0d085c" />
    <link rel="manifest" href="/manifest.json" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/js/app.js')
    
    <title>{{ config('app.name', 'Laravel') }}</title>

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



<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/slate.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/stone.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/gray.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/neutral.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/red.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/rose.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/orange.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/green.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/blue.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/yellow.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/violet.min.css"
/>
<link
  rel="stylesheet"
  href="https://unpkg.com/franken-wc@0.0.6/dist/css/zinc.min.css"
/>



    
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
                    <li class="nav-user__items"><a href="{{ route("profile.edit") }}" class="nav-user__links"><i class="icon-user" aria-hidden="true"></i><span class="hidden-xs">Profilis</span></a></li>
                    <li class="nav-user__items">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                if (confirm('Ar tikrai norite atsijungti?')) {
                  this.closest('form').submit();
                }" class="nav-user__links">
                                <i class="icon-logout" aria-hidden="true"></i><span class="hidden-xs">Atsijungti</span>
                            </a>
                        </form>
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
                                    class="icon-home" aria-hidden="true"></i>Pradžia</a>
                        </li>

                        <li class="nav-main__items">
                            <a href="{{ route('invoices.index') }}"
                                class="nav-main__links {{ request()->is('invoices*') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-home" aria-hidden="true"></i>Saskaitos</a>
                        </li>
                        <li class="nav-main__items">
                            <a href="{{ route('contrahents.index') }}"
                                class="nav-main__links {{ request()->is('contrahents*') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-home" aria-hidden="true"></i>Kontrahentai</a>
                        </li>
                        <li class="nav-main__items">
                            <a href="{{ route('products.index') }}"
                                class="nav-main__links {{ request()->is('products*') ? 'nav-main__links active' : '' }}"><i
                                    class="icon-home" aria-hidden="true"></i>Produktai</a>
                        </li>


                    </ul>
                </nav>

            </aside>

            <section class="content container-fluid">

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
                                class="icon-home" aria-hidden="true"></i>Pradžia</a></li>
                    <li class="nav-bottom__items"><a href="{{ route('contrahents.index') }}"
                            class="nav-bottom__links"><i class="icon-calendar" aria-hidden="true"></i>Kontrahentai</a>
                    </li>
                    <li class="nav-bottom__items"><a href="{{ route('invoices.create') }}" class="nav-bottom__links"><i
                                class="icon-calendar-plus" aria-hidden="true"></i>Išrašyti SF</a></li>
                    <li class="nav-bottom__items"><a href="{{ route('products.index') }}" class="nav-bottom__links"><i
                                class="icon-list" aria-hidden="true"></i>Produktai</a></li>
                </ul>
            </nav>

        </footer>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

    <script src="{{ url('8ylt-css/js/locale/datepicker-lt.js') }}"></script>




    <script>

        $(document).ready(function () {

            $('#id-job').autocomplete({
                source: '/templates/search',
                minLength: 2,
                select: function (event, ui) {
                    $("input[name=templateid]").val(ui.item.id);
                    $("input[name=name]").val(ui.item.value);
                    $("textarea[name=comment]").val(ui.item.comment);
                    $("#id-039842").val(ui.item.duration);
                    setTimeout(function () {
                        $("input[name=price]").val(ui.item.price);

                        $("input[name=templateid]").attr("readonly", true);
                        $("input[name=name]").attr("readonly", true);
                        $("textarea[name=comment]").attr("readonly", true);
                        $("#id-039842").attr("readonly", true);
                        $("input[name=price]").attr("readonly", true);
                    }, 10);
                }
            });

            $('#id-761741, #id-458066').autocomplete({
                source: '/contrahents/search',
                minLength: 2,
                select: function (event, ui) {
                    console.log(ui.item);
                    $("input[name=clientid]").val(ui.item.id);
                    setTimeout(function () {
                        $("input[name=client_name]").val(ui.item.name);
                        $("input[name=client_phone]").val(ui.item.phone);
                    }, 20);
                }
            });

            $('.atime').autocomplete({
                source: '/completions/timetodecimal',
                minLength: 2,
            });
        });

/*
        window.addEventListener("visibilitychange", function () {
            console.log("Visibility changed");
            if (document.visibilityState === "visible") {
                console.log("APP resumed");
                window.location.reload();
            }
        });
        */
    </script>

    {{-- <script src="https://unpkg.com/htmx.org@1.9.12"></script> --}}

    <script src="{{ url('8ylt-css/js/main.js?' . rand(999, 999999999)) }}"></script>

    @stack('scripts')


</body>

</html>