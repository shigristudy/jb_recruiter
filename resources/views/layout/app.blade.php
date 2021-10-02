<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('theme/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/custom.css') }}" rel="stylesheet" />
    <!-- Document Title -->
    <title>Doob</title>
    @stack('styles')
</head>
<body>
    @include('layout.header')

    @yield('content')

    @include('layout.footer')

    @stack('script')
</body>

</html>
