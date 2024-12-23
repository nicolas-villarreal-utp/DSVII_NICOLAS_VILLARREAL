<?php
class LibroGuardado {
    private $conn;
    private $table = "libros_guardados";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function guardarLibro($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal) {
        $query = "INSERT INTO " . $this->table . " (user_id, google_books_id, titulo, autor, imagen_portada, resena_personal, fecha_guardado) VALUES (:user_id, :google_books_id, :titulo, :autor, :imagen_portada, :resena_personal, NOW())";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":google_books_id", $google_books_id);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":autor", $autor);
        $stmt->bindParam(":imagen_portada", $imagen_portada);
        $stmt->bindParam(":resena_personal", $resena_personal);

        return $stmt->execute();
    }

    public function obtenerLibrosPorUsuario($user_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardarLibroDesdeGoogleBooks(GoogleBooksAPI $googleBooksAPI, $user_id, $google_books_id, $resena_personal) {
        
        $libroData = $googleBooksAPI->obtenerLibroPorId($google_books_id);
    
        $titulo = $libroData['volumeInfo']['title'] ?? '';
        $autor = implode(", ", $libroData['volumeInfo']['authors'] ?? []);
        $imagen_portada = $libroData['volumeInfo']['imageLinks']['thumbnail'] ?? '';
        
        $this->guardarLibro($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal);
    }
    
    //Funcion ELiminar Libro
    public function eliminarLibro($libroguardado_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :libroguardado_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":libroguardado_id", $libroguardado_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>
