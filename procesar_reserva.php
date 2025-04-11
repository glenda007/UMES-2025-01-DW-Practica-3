<?php
class Reserva {
    public $nombre;
    public $telefono;
    public $fecha;
    public $hora;
    public $descripcion;

    public function __construct($nombre, $telefono, $fecha, $hora, $descripcion = "") {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
    }

    public function guardarEnArchivo($archivo) {
        $linea = $this->nombre . "|" . $this->telefono . "|" . $this->fecha . "|" . $this->hora . "|" . $this->descripcion . "\n";
        file_put_contents($archivo, $linea, FILE_APPEND);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reserva = new Reserva(
        $_POST["nombre"],
        $_POST["telefono"],
        $_POST["fecha"],
        $_POST["hora"],
        $_POST["descripcion"] ?? ""
    );
    $reserva->guardarEnArchivo("reservaciones.txt");
    header("Location: index.html?reserva=ok");
    exit;
}
?>