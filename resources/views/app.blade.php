<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.site.title') }}</title>
    <meta name="description" content="{{ config('app.site.description') }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => auth()->user(),
            'signedIn' => auth()->check(),
            'urls' => config('app.social_urls')
        ]) !!};
    </script>
</head>
<body>
<header id="app">
    <header class="bg-gray-100 bg-no-repeat bg-left py-1" style="background-image: url(/images/bubbles.svg)">
        <div class="text-3xl text-center tracking-widest">
            Peruscape
        </div>
    </header>
    <main style="min-height: 80vh">
        @yield('content')
    </main>
    <footer class="flex items-center justify-center bg-gray-100 py-2">
        <div>

        </div>
        <div class="text-green-500 tracking-wider">
            © Peruscape
        </div>
    </footer>
</header>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
