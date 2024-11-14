<?php
class GoogleBooksAPI {
    private $apiKey;
    private $baseUrl = "https://www.googleapis.com/books/v1/volumes";

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function buscarLibros($query) {
        $url = $this->baseUrl . "?q=" . urlencode($query) . "&key=" . $this->apiKey;
        return $this->realizarSolicitud($url);
    }

    public function obtenerLibroPorId($google_books_id) {
        $url = $this->baseUrl . "/" . $google_books_id . "?key=" . $this->apiKey;
        return $this->realizarSolicitud($url);
    }

    private function realizarSolicitud($url) {
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
?>
