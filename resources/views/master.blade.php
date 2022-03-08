<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <title>Virtual Library</title>
</head>
<body>
    @include('partials.header')
    @auth
        <span id="username">{{ Auth::user()->name }}</span>
    @endauth
    @yield('content')
</body>
</html>