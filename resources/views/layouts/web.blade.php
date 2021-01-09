<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{url('frontend/img/icon.ico')}}" type="image/x-icon">
    @include('includes/frontend/style')

    <title>ZakatKita</title>
</head>

<body>

    @include('includes/frontend/navbar')

    @yield('content')

    @include('includes/frontend/script')

    @yield('scripts')
</body>

</html>
