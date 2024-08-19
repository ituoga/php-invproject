
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#527DE0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Poppins:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.min.css" media="screen">
    <title>Ituoga.com</title>

    <style>
        .header {
            min-height: 300px;
        }

    </style>
</head>

<body class="home">

<div class="wrapper clearfix">

    <header class="header">

        <div class="header__top">

            <div class="main main--flex">

                <a href="#" class="site-logo site-logo--top" aria-label="P6">P6</a>

                <nav class="nav-main js-dropdown" id="nav-main">
                    <ul class="nav-main__list">
                        <li class="nav-main__items"><a href="{{ url("/") }}" class="nav-main__links">Pradžia</a></li>
                    </ul>
                </nav>

                <div class="header__buttons">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route("login") }}" class="btn btn--default">Login</a>
                            <a href="{{ route("register")  }}" class="btn btn--transparent">Register</a>
                        @else
                            <a href="{{ url("/dashboard") }}" class="btn btn--default">Mano paskyra</a>
                            <a href="{{ route("logout") }}" class="btn btn--transparent">Atsijungti</a>
                        @endauth

                    @endif
                </div>

                <a href="#nav-main" class="site-hamburger site-hamburger--collapse js-dropdown-link" aria-label="Navigacija">
          <span class="site-hamburger__box">
            <span class="site-hamburger__inner"></span>
          </span>
                </a>

            </div>

        </div>

    </header>

    <main class="body">

        <div class="main main--flex">

            <aside class="aside">

                <h4 class="hidden-xs">Sonine navigacija</h4>
                <a href="#nav-side" class="aside__toggle hidden-sm hidden-xl js-dropdown-link">Navigacija</a>

                <nav class="nav-side js-dropdown" id="nav-side">
                    <ul class="nav-side__list">
                        @foreach($posts as $post)
                        <li class="nav-side__items"><a href="{{ url("/p/".$post->slug) }}" class="nav-side__links ">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </nav>

            </aside>

            <section class="content">

                Sveiki



            </section>

        </div>

    </main>

    <footer class="footer">

        <div class="main clearfix">

            <div class="footer__wrap">

                <div class="footer__col clearfix">
                    <a href="#" class="site-logo site-logo--bottom" aria-label="Ituoga.com logo"><img src="img/logo.svg" alt=""></a>
                    <p class="small p-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus.</p>
                </div>

                <div class="footer__col clearfix">
                    <h5 class="text-uppercase">{{ __("Navigacija") }}</h5>
                    <nav class="nav-bottom">
                        <ul class="nav-bottom__list">
                            <li class="nav-bottom__items"><a href="{{ url("/") }}" class="nav-bottom__links">Pradžia</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="footer__col clearfix">
                    <h5 class="text-uppercase">{{ __("Informacija") }}</h5>
                    <nav class="nav-bottom">
                        <ul class="nav-bottom__list">
                            <li class="nav-bottom__items"><a href="#" class="nav-bottom__links">Privacy</a></li>
                            <li class="nav-bottom__items"><a href="#" class="nav-bottom__links">FAQ</a></li>
                            <li class="nav-bottom__items"><a href="#" class="nav-bottom__links">Help</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="footer__col clearfix">
                    <h5 class="text-uppercase">{{__("Kontaktai")}}</h5>
                    <nav class="nav-bottom">
                        <ul class="nav-bottom__list">
                            <li class="nav-bottom__items"><a href="mailto:info@ituoga.lt"><span>info@ituoga.lt</span></a></li>
                            <li class="nav-bottom__items"><a href="tel:+37063594444" class="nav-bottom__links"><img src="/img/icon-phone.svg" alt="">+37068686862</a></li>
                        </ul>
                    </nav>
                </div>

            </div>

        </div>

    </footer>

</div>

<script src="/js/main.min.js"></script>

</body>

</html>
