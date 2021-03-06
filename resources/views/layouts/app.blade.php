<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ 'css/style.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ 'css/main.css' }}">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ 'js/script.js' }}"></script>
    <link rel="shortcut icon" href="{{ 'icon/favicon.ico' }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ 'icon/apple-touch-icon.png' }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ 'icon/apple-touch-icon-57x57.png' }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ 'icon/apple-touch-icon-72x72.png' }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ 'icon/apple-touch-icon-76x76.png' }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ 'icon/apple-touch-icon-114x114.png' }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ 'icon/apple-touch-icon-120x120.png' }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ 'icon/apple-touch-icon-144x144.png' }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ 'icon/apple-touch-icon-152x152.png' }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ 'icon/apple-touch-icon-180x180.png' }}" />
    <title>{{$title ?? 'document'}}</title>
</head>
<body>
    @yield('header')
    @yield('content')
</body>
</html>