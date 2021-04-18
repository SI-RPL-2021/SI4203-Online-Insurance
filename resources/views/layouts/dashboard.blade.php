<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Insurance - @yield('title')</title>
    <link rel="stylesheet" href="{{ '/css/app.css' }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="p-0 antialiased min-vh-100">
    @component('components.sidebar')

    @endcomponent

    <div class="bg-gray-100 position-relative" style="margin-left: 15rem">
        <div style="z-index: 100" class="top-0 px-4 shadow-sm position-fixed navbar d-flex justify-content-between navbar-expand w-100 bg-light">
            <h4 class="mb-0 fw-bold">@yield('title', 'Dashboard')</h4>
            <div>
                <a href="/" class="btn btn-outline-warning">Home</a>
                <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
        <main style="margin-top: 55px">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>