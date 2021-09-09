{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

{{-- <!DOCTYPE html>
<html>
<head>
   

</head>

<body class="body">
    <div class="grid-container">


        <div class="header ">
            <div class="fse" onclick="window.location.href = 'http://127.0.0.1:8000/'">
                Fascicolo Sanitario Elettronico
            </div>
        </div>

        <div class="sidebarA " >
            <div>
                <img src="{{ URL::to('/assets/img/logosicilia.png') }}" height="100px" style="margin-left: 22px;" onclick="window.location.href = 'http://127.0.0.1:8000/'">
            </div>
            <div class="write-sicilia">
                REGIONE SICILIANA
            </div>
        </div>

        <div class="sidebarM " >
        </div>
       
        <div class="sidebarA ">
            <h3 class="logout"> {{ Auth::user()->name }} </h3>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="logout" href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"> 
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
      
        <div></div>

            
            
        
        @yield('body')   
    </div> --}}
