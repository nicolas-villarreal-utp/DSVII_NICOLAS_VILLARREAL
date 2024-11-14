<?php
require_once 'database.php';
require_once 'modelos/Usuario.php';
require_once 'modelos/LibroGuardado.php';
require_once 'api/GoogleBooksAPI.php';

// Conectar a la base de datos
$database = new Database();
$db = $database->connect();

// Crear un nuevo usuario
$usuario = new Usuario($db);
//$usuario->crearUsuario("email@ejemplo.com", "Nombre Usuario", "google_id_123");

// Guardar un libro para un usuario
$libro = new LibroGuardado($db);
//$libro->guardarLibro(1, "google_books_id_456", "Título del Libro", "Autor del Libro", "URL_de_imagen", "Reseña del libro");

// Obtener todos los usuarios
$usuarios = $usuario->obtenerUsuarios();
print_r($usuarios);

$apiKey = "AIzaSyBsUUK1e1BVTQNUBHiL_uBB51NIBxeewrk"; // Reemplaza con tu clave de API de Google Books
$googleBooks = new GoogleBooksAPI($apiKey);

// Buscar libros por título o autor
$query = "harry potter";
$resultados = $googleBooks->buscarLibros($query);

// Mostrar resultados de búsqueda
foreach ($resultados['items'] as $item) {

    echo "ID: " . $item['id'] . "<br>";
    echo "Título: " . $item['volumeInfo']['title'] . "<br>";
    if (isset($item['volumeInfo']['authors'])) {
        echo "Autor: " . implode(", ", $item['volumeInfo']['authors']) . "<br>";
    }
    if (isset($item['volumeInfo']['description'])) {
        echo "Descripción: " . $item['volumeInfo']['description'] . "<br><br>";
    }
}

// Obtener información específica de un libro por su ID de Google Books
$googleBooksId = 'XLVvAAAACAAJ'; // Reemplaza con un ID válido de un libro en Google Books

if($googleBooksId != 0){
    $libro->guardarLibroDesdeGoogleBooks($googleBooks, 5, $googleBooksId);
}

echo '<hr>';

// Obtener libros guardados por un usuario específico
$libros_usuario = $libro->obtenerLibrosPorUsuario(5);

// Mostrar resultados de búsqueda
foreach ($libros_usuario as $libro) {

    echo "Título: " . $libro['titulo'] . "<br>";
    echo "Autor: " . $libro['autor'] . "<br>";
    echo "Reseña Personal: " . $libro['resena_personal'] . "<br>";

}

?>