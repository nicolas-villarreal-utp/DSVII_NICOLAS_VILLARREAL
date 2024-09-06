<?php

// Luego, cree un archivo principal llamado procesar_compras.php que incluya el archivo
// funciones_tienda.php. En procesar_compras.php, implemente lo siguiente:

include 'funciones_tienda.php';

// 1. Cree un array asociativo con 5 productos y sus precios (por ejemplo: ['camisa' => 50, 'pantalon' => 70, 'zapatos' => 80, 'calcetines' => 10, 'gorra' => 25]).

$productos = [
    'camisa' => 150,
    'pantalon' => 170,
    'zapatos' => 180,
    'calcetines' => 110,
    'gorra' => 125
];

// 2. Cree un array asociativo que simule un carrito de compras. Las claves deben ser
// los nombres de los productos y los valores las cantidades de cada producto. Por

$carrito = [
    'camisa' => 5,
    'pantalon' => 5,
    'zapatos' => 1,
    'calcetines' => 5,
    'gorra' => 0
];

// 1. Esto representaría un carrito con 5 camisas, 5 pantalón, 1 par de zapatos, 5 pares de calcetines y ninguna gorra.
// 2. Utilice un bucle para calcular el subtotal de la compra, multiplicando el precio de cada producto por su cantidad en el carrito.
// 3. Utilice las funciones creadas para calcular el descuento, el impuesto y el total a pagar.
// 4. Muestre un resumen de la compra en formato HTML que incluya:
// • Lista de productos comprados con sus cantidades y precios.
// • Subtotal
// • Descuento aplicado
// • Impuesto
// • Total a pagar

$subtotal = 0;
$descuento = 0;

foreach ($carrito as $producto => $cantidad) {
    $subtotal += $productos[$producto] * $cantidad;
}

$descuento = calcular_descuento($subtotal);

echo "<h1>Resumen de la compra</h1>";
echo "<hr>";
echo "<ul>";
foreach ($carrito as $producto => $cantidad) {
    echo "<li>$producto: $cantidad * B/. " . $productos[$producto] . " = B/. " . $productos[$producto] * $cantidad . "</li>";
}

echo "</ul>";
echo "<hr>";
echo "<p>Subtotal:  B/. " . $subtotal . "</p>";
echo "<p>Descuento: B/. " . $descuento . "</p>";
echo "<p>Impuesto:  B/. " . aplicar_impuesto($subtotal) . "</p>";
echo "<h2>Total a pagar: B/. " . calcular_total($subtotal, $descuento, aplicar_impuesto($subtotal)) . "</h2>";
