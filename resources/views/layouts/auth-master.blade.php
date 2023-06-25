<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Signin Template · Bootstrap v5.1</title>
    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet">
    <style>
        body{
          width: 100%;
          height: 100vh;          
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .form-signin{
          width: 400px;
        }
    </style>
</head>
<body class="text-center">
    <main class="form-signin">
        @yield('content')        
    </main>
</body>
</html>