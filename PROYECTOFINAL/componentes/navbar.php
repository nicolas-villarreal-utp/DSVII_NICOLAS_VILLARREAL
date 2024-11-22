<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand" href="#">Agencia de Viajes EMN</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <?php if (isset($_SESSION['usuario'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="reservas.php">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Paquetes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrarusuario.php">Registrar Usuario</a>
                </li>
            <?php endif; ?>

            <?php //print_r($_SESSION); ?>

            <?php if (isset($_SESSION['id']) || isset($_SESSION['usuario'])) : ?>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Salir</a>
                </li>
            <?php else: ?>
                <?php if (!isset($_SESSION['usuario'])) : ?>
                    <li>
                        <a class="nav-link text-success" href="<?php echo $client->createAuthUrl() ?>">Ingresar con Google</a>
                    </li>
                    <li>
                        <a class="nav-link text-warning" href="iniciarsesion.php">Ingresar con Administrador</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Salir</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</nav>