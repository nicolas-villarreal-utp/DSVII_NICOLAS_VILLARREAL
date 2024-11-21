<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Paquetes de Viaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            margin: 20px;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        section {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], textarea {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], input[type="button"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }
        .package-list {
            margin-top: 20px;
        }
        .package-item {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<header>
    <h1>Panel de Administración - Paquetes de Viaje</h1>
</header>

<nav>
    <a href="#crear">Crear Paquete</a>
    <a href="#modificar">Modificar Paquete</a>
    <a href="#eliminar">Eliminar Paquete</a>
</nav>

<section id="crear">
    <h2>Crear Paquete de Viaje</h2>
    <form action="crear_paquete.php" method="POST">
        <label for="nombre">Nombre del paquete:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" min="0" required>

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" required>

        <input type="submit" value="Crear Paquete">
    </form>
</section>

<section id="modificar">
    <h2>Modificar Paquete de Viaje</h2>
    <form action="modificar_paquete.php" method="POST">
        <label for="paquete">Selecciona un paquete:</label>
        <select id="paquete" name="paquete" required>
            <option value="1">Paquete 1</option>
            <option value="2">Paquete 2</option>
            <option value="3">Paquete 3</option>
        </select>

        <label for="nombre_mod">Nuevo nombre del paquete:</label>
        <input type="text" id="nombre_mod" name="nombre_mod">

        <label for="descripcion_mod">Nueva descripción:</label>
        <textarea id="descripcion_mod" name="descripcion_mod" rows="4"></textarea>

        <label for="precio_mod">Nuevo precio:</label>
        <input type="number" id="precio_mod" name="precio_mod" min="0">

        <label for="destino_mod">Nuevo destino:</label>
        <input type="text" id="destino_mod" name="destino_mod">

        <input type="submit" value="Modificar Paquete">
    </form>
</section>

<section id="eliminar">
    <h2>Eliminar Paquete de Viaje</h2>
    <form action="eliminar_paquete.php" method="POST">
        <label for="paquete_eliminar">Selecciona un paquete para eliminar:</label>
        <select id="paquete_eliminar" name="paquete_eliminar" required>
            <option value="1">Paquete 1</option>
            <option value="2">Paquete 2</option>
            <option value="3">Paquete 3</option>
        </select>

        <input type="submit" value="Eliminar Paquete">
    </form>
</section>

<section class="package-list">
    <h2>Listado de Paquetes Disponibles</h2>
    <div class="package-item">
        <span>Paquete 1 - $500 - Destino: Playa</span>
        <button type="button">Modificar</button>
        <button type="button">Eliminar</button>
    </div>
    <div class="package-item">
        <span>Paquete 2 - $800 - Destino: Montaña</span>
        <button type="button">Modificar</button>
        <button type="button">Eliminar</button>
    </div>
</section>

</body>
</html>