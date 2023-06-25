<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: url('https://sgc.unach.edu.ec/wp-content/uploads/2020/06/unach-edificios.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      animation: fadeIn 3s ease-in-out 1 both;
    }

    .content {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    @keyframes fadeIn {
      0% {opacity: 0;}
      100% {opacity: 1;}
    }
  </style>
  
  <title>Welcome</title>
</head>
<body>
    <div class="content">
        <h1 class="display-4 text-light">¡Bienvenido a Nuestro Sitio Web!</h1>
        <p class="lead text-light">Este es un lugar increíble para presentar tu información.</p>

        <div class="mt-4">
        <a class="btn btn-light btn-lg mr-2" href="/login" role="button">Inicia Sesión</a>
        <a class="btn btn-light btn-lg" href="/register" role="button">Registrate</a>
        </div>
    </div>
  <!-- Bootstrap Bundle with Popper -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
