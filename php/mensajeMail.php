<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $empresa = $_POST['empresa'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $entre_calles = $_POST['entre_calles'];
    $cp = $_POST['cp'];
    $telefono = $_POST['telefono'];
    $especificaciones = $_POST['especificaciones'];

    $to = "tu_correo@example.com";
    $subject = "Copa América";
    $message = "Nombre: $nombre
    Apellido: $apellido
    Correo: $correo
    Empresa: $empresa
    Ciudad: $ciudad
    Direccion: $direccion
    EntreCalles: $entre_calles
    Cp: $cp
    Teléfono: $telefono
    Consentimiento: $especificaciones";
    $headers = "From: $correo";

    mail($to, $subject, $message, $headers);

    // Redirigir a una página de éxito
    header("Location: gracias.html");
    exit();
}
?>