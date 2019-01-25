<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cyborg Tech') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <div id='app'> 
            @include('layouts.navbar')
           
            <main role="main" class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-sm-10">
                        @include('layouts.message')
                        @yield('content')
                    </div>

                    <div id="forAds" class="col-md-2 col-sm-2">
                    </div>
                </div>
                
            </main>
        </div>
</body>
</html>
