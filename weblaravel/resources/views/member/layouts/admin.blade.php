<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('css')
</head>
<body>
<div class="container">
    {{--消息提示--}}
    @include('member.layouts.msg')
    @yield('cnt')
</div>
<script src="/js/app.js"></script>
    @yield('js/')
</body>
</html>