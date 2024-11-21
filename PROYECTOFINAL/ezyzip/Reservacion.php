<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservación de Viajes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Reservación de Viaje</h1>
    <form action="reservar.php" method="POST">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

        <label for="telefono">Número de Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" placeholder="123-456-7890" required>

        <label for="destino">Destino:</label>
        <select id="destino" name="destino" required>
            <option value="">Selecciona un destino</option>
            <option value="paris">París, Francia</option>
            <option value="tokio">Tokio, Japón</option>
            <option value="nueva_york">Nueva York, EE.UU.</option>
            <option value="sydney">Sídney, Australia</option>
        </select>

        <label for="fecha">Fecha de Salida:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="pasajeros">Número de Pasajeros:</label>
        <input type="number" id="pasajeros" name="pasajeros" min="1" max="10" required>

        <label for="comentarios">Comentarios Adicionales:</label>
        <textarea id="comentarios" name="comentarios" placeholder="Ingresa cualquier requerimiento especial" rows="4"></textarea>

        <button type="submit">Reservar Ahora</button>
    </form>
</div>

</body>
</html>
