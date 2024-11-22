<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Agencia de Viajes EMN</title>
</head>

<body>
    <?php include_once 'componentes/navbar.php'; ?>

    <div class="container">
        <div class="row">

            <?php

            require_once 'Modelos/Paquetes.php';
            require_once 'Modelos/Conexion.php';

            $db = new Conexion();
            $db = $db->conectar();

            $paquetes = new Paquetes($db);
            $paquete = $paquetes->obtenerPaquete($_GET['id'])[0];

            ?>

            <h2 class="text-center">Editar Paquete Turístico</h2>
            <form action="paqueteactualizar.php" method="POST" enctype="multipart/form-data">
                <!-- Campo oculto para el ID del paquete -->
                <input type="hidden" name="id" value="<?php echo $paquete['id']; ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Paquete</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="<?php echo $paquete['nombre']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>
                    <?php echo htmlspecialchars($paquete['descripcion']); ?>
                </textarea>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio (USD)</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio"
                        value="<?php echo htmlspecialchars($paquete['precio']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                        value="<?php echo htmlspecialchars($paquete['ubicacion']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="disponibilidad" class="form-label">Disponibilidad</label>
                    <input type="number" class="form-control" id="disponibilidad" name="disponibilidad"
                        value="<?php echo htmlspecialchars($paquete['disponibilidad']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Subir Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                    <!-- Mostrar la imagen actual si ya existe -->
                    <?php if (!empty($paquete['imagen_url'])): ?>
                        <img src="<?php echo htmlspecialchars($paquete['imagen_url']); ?>"
                            alt="Imagen actual" class="img-thumbnail mt-2" width="200">
                    <?php endif; ?>
                    <input type="hidden" name="imagen_url" value="<?php echo $paquete['imagen_url'] ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                        value="<?php echo htmlspecialchars($paquete['fecha_inicio']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                        value="<?php echo htmlspecialchars($paquete['fecha_fin']); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Paquete</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>

</html>