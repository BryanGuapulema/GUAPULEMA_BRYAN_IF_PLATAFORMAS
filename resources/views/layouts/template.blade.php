<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet">        
</head>

<body>

    <main>
        @yield('content')        
        <script src="{!! url('assets/js/bootstrap.bundle.min.js') !!}"></script>
    </main>
</body>
</html>