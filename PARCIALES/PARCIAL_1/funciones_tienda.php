<?php

// 1. calcular_descuento($total_compra):
// • Si la compra es menor a $100, no hay descuento.
// • Si la compra es de $100 a $500, aplica un 5% de descuento.
// • Si la compra es de $501 a $1000, aplica un 10% de descuento.
// • Si la compra es mayor a $1000, aplica un 15% de descuento. 
// La función debe devolver el monto del descuento.

function calcular_descuento($total_compra){
    if($total_compra < 100){
        return 0;
    }elseif($total_compra >= 100 && $total_compra <= 500){
        return $total_compra * 0.05;
    }elseif($total_compra >= 501 && $total_compra <= 1000){
        return $total_compra * 0.10;
    }else{
        return $total_compra * 0.15;
    }
}

// 2. aplicar_impuesto($subtotal):
// • Aplica un impuesto del 7% al subtotal.
// • Devuelve el monto del impuesto.
function aplicar_impuesto($subtotal){
    return $subtotal * 0.07;
}

// 3. calcular_total($subtotal, $descuento, $impuesto):
// • Calcula y devuelve el total a pagar (subtotal - descuento + impuesto).

function calcular_total($subtotal, $descuento, $impuesto){
    return $subtotal - $descuento + $impuesto;
}

?>