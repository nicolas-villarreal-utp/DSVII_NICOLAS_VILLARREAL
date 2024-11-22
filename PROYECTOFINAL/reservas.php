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

            require_once 'Modelos/Reserva.php';
            require_once 'Modelos/Conexion.php';
            require_once 'Modelos/Paquetes.php';
            require_once 'Modelos/Cliente.php';

            $db = new Conexion();
            $db = $db->conectar();

            $reservas = new Reserva($db);
            $reservas = $reservas->obtenerReservas();

            ?>
            <div class="col-12">
                <h2>Reservas Pendientes</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Paquete</th>
                            <th scope="col">Fecha de Reserva</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva) : ?>
                            <?php if ($reserva['estado'] == 'Pendiente'): ?>
                                <tr>
                                    <th scope="row"><?php echo $reserva['id']; ?></th>
                                    <?php
                                    $paquete = new Paquetes($db);
                                    $paquete = $paquete->obtenerPaquete($reserva['paquete_id'])[0];
                                    $nombrePaquete = $paquete['nombre'];
                                    ?>
                                    <td><?php echo $nombrePaquete; ?></td>


                                    <td><?php echo $reserva['fecha_reserva']; ?></td>
                                    <?php
                                    $cliente = new Cliente($db);
                                    $cliente = $cliente->obtenerCliente($reserva['cliente_id'])[0];
                                    $nombreCliente = $cliente['nombre'];
                                    ?>
                                    <td><?php echo $nombreCliente; ?></td>
                                    <td>
                                        <form action="reservacancelar.php" method="POST">
                                            <input type="hidden" name="reserva_id" value="<?php echo $reserva['id']; ?>">
                                            <button type="submit" class="btn btn-danger">Cancelar</button>
                                        </form>
                                        <form action="reservaconfirmar.php" method="POST">
                                            <input type="hidden" name="reserva_id" value="<?php echo $reserva['id']; ?>">
                                            <button type="submit" class="btn btn-success">Confirmar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <h2>Reservas Confirmadas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Paquete</th>
                            <th scope="col">Fecha de Reserva</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva) : ?>
                            <?php if ($reserva['estado'] == 'Confirmado'): ?>
                                <tr>
                                    <th scope="row"><?php echo $reserva['id']; ?></th>
                                    <?php
                                    $paquete = new Paquetes($db);
                                    $paquete = $paquete->obtenerPaquete($reserva['paquete_id'])[0];
                                    $nombrePaquete = $paquete['nombre'];
                                    ?>
                                    <td><?php echo $nombrePaquete; ?></td>


                                    <td><?php echo $reserva['fecha_reserva']; ?></td>
                                    <?php
                                    $cliente = new Cliente($db);
                                    $cliente = $cliente->obtenerCliente($reserva['cliente_id'])[0];
                                    $nombreCliente = $cliente['nombre'];
                                    ?>
                                    <td><?php echo $nombreCliente; ?></td>
                                    <td>
                                        <form action="reservas/reservacancelar.php" method="POST">
                                            <input type="hidden" name="reserva_id" value="<?php echo $reserva['id']; ?>">
                                            <button type="submit" class="btn btn-danger">Cancelar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <h2>Reservas Canceladas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Paquete</th>
                            <th scope="col">Fecha de Reserva</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva) : ?>
                            <?php if ($reserva['estado'] == 'Cancelado'): ?>
                                <tr>
                                    <th scope="row"><?php echo $reserva['id']; ?></th>
                                    <?php
                                    $paquete = new Paquetes($db);
                                    $paquete = $paquete->obtenerPaquete($reserva['paquete_id'])[0];
                                    $nombrePaquete = $paquete['nombre'];
                                    ?>
                                    <td><?php echo $nombrePaquete; ?></td>


                                    <td><?php echo $reserva['fecha_reserva']; ?></td>
                                    <?php
                                    $cliente = new Cliente($db);
                                    $cliente = $cliente->obtenerCliente($reserva['cliente_id'])[0];
                                    $nombreCliente = $cliente['nombre'];
                                    ?>
                                    <td><?php echo $nombreCliente; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>