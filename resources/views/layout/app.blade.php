<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="nofollow" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

        <style>
            html,
            body,
            h1,
            h2,
            h3,
            h4 {
                font-family: Geneva, Verdana, sans-serif;
            }

            body {
                background-color: #ccc;
            }

            header {
                background: #2b569a;
                z-index: 1000
            }

            .nav-item {
                padding: 0 1rem;
            }

            .nav-item:hover {
                background-color: rgba(0, 0, 0, 0.3);
                border-radius: 10px;
            }

        </style>
        @stack('style')
    </head>
    <body class="antialiased" oncontextmenu="return false;">
        <header class="position-fixed w-100">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid align-items-end">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/img/PROValetlogov1.jpg') }}" alt="Pro Valet" width="180"/>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Operations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Personnel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
    </body>
</html>
