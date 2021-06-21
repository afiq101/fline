<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo/fav-logo.png') }}">
    <title>Fline</title>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <div id="layout-wrapper">
            @include('layouts.topbar')
            <div class="page-content">
                <div class="container-fluid mt-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    @include('layouts.footer-script')
</body>

</html>
