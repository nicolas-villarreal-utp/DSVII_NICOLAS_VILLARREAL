<?php
// home.php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <div id="loading" style="text-align:center; font-size: 24px;">
        <p>Cargando...</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "home.php";  // O cualquier otra lógica de redirección
        }, 2000);  // Redirige después de 2 segundos
    </script>
</body>
</html>
