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
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
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
<div id="app">
    <div class="hero is-white is-bold">
        <div class="hero-body is-paddingless is-centered">
            <img src="{{ asset('/images/logo.png') }}"
                 width="370"
                 alt="Peruscape">
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <div>
                    {{--<a class="icon"--}}
                    {{--:href="urls.google"--}}
                    {{--v-if="urls.google">--}}
                    {{--<i class="fa fa-google-plus"></i>--}}
                    {{--</a>--}}
                    {{--<a class="icon"--}}
                    {{--:href="urls.facebook"--}}
                    {{--v-if="urls.facebook">--}}
                    {{--<i class="fa fa-facebook"></i>--}}
                    {{--</a>--}}
                </div>
                <p>
                    © Peruscape
                </p>
            </div>
        </div>
    </footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
