<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Agencia de Viajes EMN</title>
</head>

<body>

    <?php include_once 'componentes/navbar.php'; ?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Registrar Usuario</h5>
                <form action="registrar.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Usuarios</h5>
                <ul class="list-group list-group-flush">
                    <?php
                    require_once 'Modelos/Usuario.php';
                    require_once 'Modelos/Conexion.php';

                    $db = new Conexion();
                    $db = $db->conectar();

                    $usuario = new Usuario($db);
                    $usuarios = $usuario->obtenerUsuarios();
                    foreach ($usuarios as $usuario) {

                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                        echo $usuario['nombre'] . '     ' . $usuario['email'];
                        if ($usuario['email'] !== $_SESSION['usuario']) {
                            echo '<form action="eliminarusuario.php" method="POST">';
                            echo '<input type="hidden" name="id" value="' . $usuario['id'] . '">';
                            echo '<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>';
                            echo '</form>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>

            </div>

        </div>
    </div>

    <!-- Link a los archivos de Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>