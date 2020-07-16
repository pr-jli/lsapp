<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- charts.js used -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        body {
            font-family: Helvetica Neue, Arial, sans-serif;
            text-align: center;
        }

        .wrapper {
            max-width: 800px;
            margin: 50px auto;
        }

        h1 {
            font-weight: 200;
            font-size: 3em;
            margin: 0 0 0.1em 0;
        }

        h2 {
            font-weight: 200;
            font-size: 0.9em;
            margin: 0 0 50px;
            color: #999;
        }

        a {
            
            display: block;
            color: #3e95cd;
        }
    </style>
    

    <!--google charts used ------------------------------------------------------------------------------------- -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart', 'controls']
        });

        google.charts.setOnLoadCallback(drawDashboard);

        function drawDashboard() {

            // Create our data table.
            var data = google.visualization.arrayToDataTable([
                ['Name', 'Donuts eaten'],
                ['Michael', 5],
                ['Elisa', 7],
                ['Robert', 3],
                ['John', 2],
                ['Jessica', 6],
                ['Aaron', 1],
                ['Margareth', 8]
            ]);

            var dashboard = new google.visualization.Dashboard(
                document.getElementById('dashboard_div'));

            var donutRangeSlider = new google.visualization.ControlWrapper({
                'controlType': 'NumberRangeFilter',
                'containerId': 'filter_div',
                'options': {
                    'filterColumnLabel': 'Donuts eaten'
                }
            });

            var pieChart = new google.visualization.ChartWrapper({
                'chartType': 'PieChart',
                'containerId': 'chart_div',
                'options': {
                    'width': 700,
                    'height': 700,
                    'pieSliceText': 'value',
                    'legend': 'right'
                }
            });

          
            dashboard.bind(donutRangeSlider, pieChart);

            // Draw the dashboard.
            dashboard.draw(data);
        }
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'lsapp') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts">Blog</a>
                        </li>
                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="/dashboard">My Dashboard
                                </a>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                @include('inc.messages')
                @yield('content')</div>

        </main>
        <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('article-ckeditor');
        </script>

    </div>
</body>

</html>