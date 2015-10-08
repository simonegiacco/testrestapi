<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    @yield('head')

</head>
<body>
    @include('partials.navbar')

    <div class="container-fluid">
        @yield('content')
    </div>

    @yield('footer')

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    @yield('scripts')
</body>
</html>