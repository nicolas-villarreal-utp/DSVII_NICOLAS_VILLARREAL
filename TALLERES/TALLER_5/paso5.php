<?php
// 1. Crear un string JSON con datos de una tienda en línea
$jsonDatos = '
{
    "tienda": "ElectroTech",
    "productos": [
        {"id": 1, "nombre": "Laptop Gamer", "precio": 1200, "categorias": ["electrónica", "computadoras"]},
        {"id": 2, "nombre": "Smartphone 5G", "precio": 800, "categorias": ["electrónica", "celulares"]},
        {"id": 3, "nombre": "Auriculares Bluetooth", "precio": 150, "categorias": ["electrónica", "accesorios"]},
        {"id": 4, "nombre": "Smart TV 4K", "precio": 700, "categorias": ["electrónica", "televisores"]},
        {"id": 5, "nombre": "Tablet", "precio": 300, "categorias": ["electrónica", "computadoras"]}
    ],
    "clientes": [
        {"id": 101, "nombre": "Ana López", "email": "ana@example.com"},
        {"id": 102, "nombre": "Carlos Gómez", "email": "carlos@example.com"},
        {"id": 103, "nombre": "María Rodríguez", "email": "maria@example.com"}
    ]
}
';

// 2. Convertir el JSON a un arreglo asociativo de PHP
$tiendaData = json_decode($jsonDatos, true);

// 3. Función para imprimir los productos
function imprimirProductos($productos) {
    foreach ($productos as $producto) {
        echo "{$producto['nombre']} - {$producto['precio']} - Categorías: " . implode(", ", $producto['categorias']) . "<br>";
    }
}

echo "Productos de {$tiendaData['tienda']}:<br>";
imprimirProductos($tiendaData['productos']);

// 4. Calcular el valor total del inventario
$valorTotal = array_reduce($tiendaData['productos'], function($total, $producto) {
    return $total + $producto['precio'];
}, 0);

echo "<br>Valor total del inventario: $$valorTotal<br>";

// 5. Encontrar el producto más caro
$productoMasCaro = array_reduce($tiendaData['productos'], function($max, $producto) {
    return ($producto['precio'] > $max['precio']) ? $producto : $max;
}, $tiendaData['productos'][0]);

echo "<br>Producto más caro: {$productoMasCaro['nombre']} ({$productoMasCaro['precio']})<br>";

// 6. Filtrar productos por categoría
function filtrarPorCategoria($productos, $categoria) {
    return array_filter($productos, function($producto) use ($categoria) {
        return in_array($categoria, $producto['categorias']);
    });
}

$productosDeComputadoras = filtrarPorCategoria($tiendaData['productos'], "computadoras");
echo "<br>Productos en la categoría 'computadoras':<br>";
imprimirProductos($productosDeComputadoras);

// 7. Agregar un nuevo producto
$nuevoProducto = [
    "id" => 6,
    "nombre" => "Smartwatch",
    "precio" => 250,
    "categorias" => ["electrónica", "accesorios", "wearables"]
];
$tiendaData['productos'][] = $nuevoProducto;

// 8. Convertir el arreglo actualizado de vuelta a JSON
$jsonActualizado = json_encode($tiendaData, JSON_PRETTY_PRINT);
echo "<br>Datos actualizados de la tienda (JSON):<br>$jsonActualizado<br>";

// TAREA: Implementa una función que genere un resumen de ventas
// Crea un arreglo de ventas (producto_id, cliente_id, cantidad, fecha)
// y genera un informe que muestre:
// - Total de ventas
// - Producto más vendido
// - Cliente que más ha comprado
// Tu código aquí

function generarResumenVentas($ventas) {
    $resumen = [    
        "total_ventas" => 0,
        "producto_mas_vendido" => null,
        "cliente_mas_compras" => null
    ];

    $ventasPorProducto = array_count_values(array_column($ventas, "producto_id"));  
    $ventasPorCliente = array_count_values(array_column($ventas, "cliente_id"));
    
    $resumen["total_ventas"] = count($ventas);

    $productoMasVendidoId = array_search(max($ventasPorProducto), $ventasPorProducto);
    $resumen["producto_mas_vendido"] = $productoMasVendidoId;

    $clienteMasComprasId = array_search(max($ventasPorCliente), $ventasPorCliente);
    $resumen["cliente_mas_compras"] = $clienteMasComprasId;
    
    return $resumen;
}

$ventas = [
    ["producto_id" => 1, "cliente_id" => 101, "cantidad" => 2, "fecha" => "2024-9-01"],
    ["producto_id" => 2, "cliente_id" => 102, "cantidad" => 1, "fecha" => "2024-9-02"],
    ["producto_id" => 1, "cliente_id" => 101, "cantidad" => 3, "fecha" => "2024-9-03"],
    ["producto_id" => 3, "cliente_id" => 103, "cantidad" => 1, "fecha" => "2024-9-04"],
    ["producto_id" => 2, "cliente_id" => 102, "cantidad" => 2, "fecha" => "2024-9-05"],
    ["producto_id" => 4, "cliente_id" => 101, "cantidad" => 1, "fecha" => "2024-9-06"],
    ["producto_id" => 5, "cliente_id" => 103, "cantidad" => 2, "fecha" => "2024-9-07"],
    ["producto_id" => 1, "cliente_id" => 102, "cantidad" => 1, "fecha" => "2024-9-08"],
    ["producto_id" => 2, "cliente_id" => 101, "cantidad" => 3, "fecha" => "2024-9-09"],
    ["producto_id" => 3, "cliente_id" => 103, "cantidad" => 1, "fecha" => "2024-9-10"]
];

$resumenVentas = generarResumenVentas($ventas);

echo "<br>Resumen de ventas:<br>";
echo "Total de ventas: {$resumenVentas['total_ventas']}<br>";   

foreach ($tiendaData['productos'] as $producto) {
    if ($producto['id'] === $resumenVentas['producto_mas_vendido']) {
        $nombreProducto = $producto['nombre'];
        break; // Salir del bucle una vez encontrado
    }
}

echo "Producto más vendido: {$resumenVentas['producto_mas_vendido']} - {$nombreProducto}<br>";

foreach ($tiendaData['clientes'] as $cliente) {
    if ($cliente['id'] === $resumenVentas['cliente_mas_compras']) {
        $nombreCliente = $cliente['nombre'];
        break; // Salir del bucle una vez encontrado
    }
}

echo "Cliente que más ha comprado: {$resumenVentas['cliente_mas_compras']} - {$nombreCliente}<br>";

?>