<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>Login</title>
  <?php 
  require_once 'configuracion.php';
  ?>
</head>

<body>
  <div class="contenedor">
    <div class="formulario">
      <?php echo "Sesión iniciada: " . session_id() . "<br>";  ?>
      <h2>Iniciar sesión</h2>
      <div class="enlace">
        <a class="btn btn-light" href="<?php echo $client->createAuthUrl() ?>">
          <img src="imagenes/ui.svg"> Iniciar sesión con Google</a>
      </div>
    </div>
  </div>
</body>

</html>