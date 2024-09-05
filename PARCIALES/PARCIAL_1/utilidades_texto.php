<?php

// Problema 1 (50 puntos)
// Cree un archivo llamado utilidades_texto.php que contenga tres funciones:
// 1. contar_palabras($texto): Recibe una cadena de texto y devuelve el número de
// palabras en el texto.

function contar_palabras($texto){
    $palabras = explode(" ", $texto);
    return count($palabras);
}

// 2. contar_vocales($texto): Recibe una cadena de texto y devuelve el número de
// vocales (a, e, i, o, u, sin distinguir entre mayúsculas y minúsculas).

function contar_vocales($texto){
    $vocales = ["a", "e", "i", "o", "u","A", "E", "I", "O", "U","á","é","í","ó","ú","Á","É","Í","Ó","Ú"];
    $texto = strtolower($texto);
    $contador = 0;
    for($i = 0; $i < strlen($texto); $i++){
        if(in_array($texto[$i], $vocales)){
            $contador++;
        }
    }
    return $contador;
}

// 3. invertir_palabras($texto): Recibe una cadena de texto y devuelve una nueva
// cadena con el orden de las palabras invertido.

function invertir_palabras($texto){
    $palabras = explode(" ", $texto);
    $palabras = array_reverse($palabras);
    return implode(" ", $palabras);
}

?>