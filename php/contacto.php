<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar los datos de entrada
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
    $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
    $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
    $entre_calles = filter_input(INPUT_POST, 'entre_calles', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $especificaciones = filter_input(INPUT_POST, 'especificaciones', FILTER_SANITIZE_STRING);
    $correo = 'alesaturno64@gmail.com'; // Reemplaza con el correo del administrador

    // Validar que los campos obligatorios no estén vacíos
    if (!$nombre || !$apellido || !$empresa || !$ciudad || !$direccion || !$entre_calles || !$cp || !$telefono || !$especificaciones) {
        die('Por favor, completa todos los campos obligatorios.');
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alesaturno64@gmail.com'; // Reemplaza con tu dirección de Gmail
        $mail->Password = 'mkun jxes cdza xpcz'; // Reemplaza con la contraseña de aplicación generada
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración de codificación
        $mail->CharSet = 'UTF-8';

        // Contenido del correo para el administrador
        $adminBody = "Nombre: " . htmlspecialchars($nombre) . "<br>Apellido: " . htmlspecialchars($apellido) . "<br>Empresa: " . htmlspecialchars($empresa) . "<br>Ciudad: " . htmlspecialchars($ciudad) . "<br>Dirección: " . htmlspecialchars($direccion) . "<br>Entre Calles: " . htmlspecialchars($entre_calles) . "<br>C.P.: " . htmlspecialchars($cp) . "<br>Teléfono: " . htmlspecialchars($telefono) . "<br>Especificaciones: " . htmlspecialchars($especificaciones);
        
        // Enviar correo al administrador
        $mail->setFrom('alesaturno64@gmail.com', 'Nubiral');
        $mail->addAddress($correo); // Reemplaza con tu dirección de Gmail (administrador)
        $mail->isHTML(true);
        $mail->Subject = 'Copa América';
        $mail->Body    = $adminBody;
        $mail->AltBody = strip_tags($adminBody);
        $mail->send();

        // Redirigir a una página de éxito
        header("Location: ../gracias.html");
        exit();
    } catch (Exception $e) {
        echo "Error al enviar el correo. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
