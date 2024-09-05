<?php

// Luego, cree un archivo principal llamado analisis_texto.php que incluya el archivo
// utilidades_texto.php. En analisis_texto.php, defina un array con 3 frases diferentes.
// Utilice un bucle para procesar cada frase con las tres funciones y muestre los
// resultados en una tabla HTML.

include "utilidades_texto.php";

$frases = [
    "Hola Buenas Tardes",
    "Programación en PHP",
    "Desarrollo de software 7 en PHP"
];

echo "<table border='1'>";

echo "<tr>";

echo "<th>Frase</th>";
echo "<th>Palabras</th>";
echo "<th>Vocales</th>";
echo "<th>Invertida</th>";

echo "</tr>";

foreach($frases as $frase){
    echo "<tr>";

    echo "<td>$frase</td>";
    echo "<td>".contar_palabras($frase)."</td>";
    echo "<td>".contar_vocales($frase)."</td>";
    echo "<td>".invertir_palabras($frase)."</td>";

    echo "</tr>";
}

echo "</table>";

?>