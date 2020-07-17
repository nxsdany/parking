<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
</head>

<body>
    @include('include.header')
    @yield('content')
    @include('include.footer')
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
