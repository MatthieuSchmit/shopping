<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<nav>
    <div class="nav-wrapper">
        <a href="{{ route('home') }}" class="brand-logo"><img src="{{ URL::asset('images/logo1.png') }}" width="210px" alt="Logo"></a>
        <a href="{{ route('home') }}" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @if($cartCount)
                <li>
                    <a class="tooltipped" href="{{ route('cart.index') }}" data-position="bottom" data-tooltip="Voir mon panier"><i class="material-icons left">shopping_cart</i>Panier({{ $cartCount }})</a>
                </li>
            @endif
            @guest
                <li><a href="{{ route('login') }}"><i class="material-icons left">perm_identity</i>Connexion</a></li>
            @else
                <li><a class="tooltipped" href="{{ route('account') }}" data-position="bottom" data-tooltip="Voir mon compte client">{{ auth()->user()->first_name . ' ' . auth()->user()->name }}</a></li>
                    @if(auth()->user()->admin)
                        <li><a href="{{ route('admin') }}"><i class="material-icons left">dashboard</i>Administration</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                        <i class="material-icons left">perm_identity</i>
                        Déconnexion
                    </a></li>
            @endguest

        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile">
    @guest
        <li><a href="{{ route('login') }}">Connexion</a></li>
    @else
        <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                Déconnexion
            </a></li>
    @endguest
</ul>
<main>
    @yield('content')
</main>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Nom de la boutique</h5>
                <ul>
                    <li class="grey-text text-lighten-3">Adresse de la boutique</li>
                    <li class="grey-text text-lighten-3">Appelez-nous...</li>
                    <li class="grey-text text-lighten-3">Écrivez-nous...</li>
                    <br>
                    <li><img src="{{ URL::asset('images/paiement.png') }}" alt="Modes de paiement" width="250px"></li>
                </ul>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Informations</h5>
                <ul>
                    @foreach ($pages as $page)
                        <li><a class="grey-text text-lighten-3" href="{{ route('page', $page->slug) }}">{{ $page->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2020 Nom de la boutique
            <a class="grey-text text-lighten-4 right" href="#" target="_blank"><img src="{{ URL::asset('images/facebook.png') }}" alt="Facebook"></a>
        </div>
    </div>
</footer>
@yield('javascript')
</body>
</html>