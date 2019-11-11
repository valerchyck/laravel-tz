<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 5.8 & MySQL CRUD Tutorial</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">

            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manufacturer.index') }}">Beer Manufacturers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beer.index') }}">Beers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beer-type.index') }}">Types</a>
                </li>
            </ul>

        </div>
    </div>

    @yield('main')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
