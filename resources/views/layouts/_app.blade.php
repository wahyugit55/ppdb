<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Name - @yield('title')</title>
    <!-- Link to CSS files, Bootstrap for example -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        @yield('content')
    </div>

    <!-- Link to JavaScript files, Bootstrap JS for example -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
