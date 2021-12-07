<?php
session_start();

require_once("../database/conexion.php");
require_once("../app/models/user.php");

require_once("../packages/vendor/autoload.php");
require_once("../config/PHPMailer_config.php");

$conexion = new Conexion;
$conexion->conectar();

$name = $_POST["name"];
$last_name = $_POST["last_name"];
$escuela = $_POST["school"];
$e_mail = $_POST["e_mail"];
$username = $_POST["user_name"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$codigo_verificacion = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

$user = new User(-1, $name, $last_name, $e_mail, 0, $username, 0);
$_SESSION["user"] = $user;

// el usuario ya existe
$already_in_BD = "SELECT id FROM Usuarios WHERE username = '$username'";
$resultado = $conexion->ejecutar($already_in_BD);

if (mysqli_num_rows($resultado) > 0 )
{
    echo 3;
    exit();
}

// ya se ha registrado el usuario pero no ha verificado su cuenta
$already_exists = "SELECT * FROM temp_Usuarios WHERE email = '$e_mail' OR username = '$username'";
$resultado = $conexion->ejecutar($already_exists);

if (mysqli_num_rows($resultado) > 0) 
{
    $query = "UPDATE temp_Usuarios 
        SET nombres = '$name', apellidos = '$last_name', email = '$e_mail', username = '$username', 
            clave = '$password', codigo_verificacion = '$codigo_verificacion'
        WHERE username = '$username'";
}
else
{
    $query = "INSERT INTO temp_Usuarios (nombres, apellidos, email, username, clave, codigo_verificacion)
    VALUES ('$name', '$last_name', '$e_mail', '$username', '$password', '$codigo_verificacion');";
}

$result = $conexion->ejecutar($query);

if ($result) 
{
    echo 0;
}
else 
{
    echo 1;
}

// Enviar E-mail al usuario con el codigo de verificacion

$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = CONTACTFORM_PHPMAILER_DEBUG_LEVEL;
    $mail->isSMTP();
    $mail->Host = CONTACTFORM_SMTP_HOSTNAME;
    $mail->SMTPAuth = true;
    $mail->Username = CONTACTFORM_SMTP_USERNAME;
    $mail->Password = CONTACTFORM_SMTP_PASSWORD;
    $mail->SMTPSecure = CONTACTFORM_SMTP_ENCRYPTION;
    $mail->Port = CONTACTFORM_SMTP_PORT;

    // Recipients
    $mail->setFrom(CONTACTFORM_FROM_ADDRESS, CONTACTFORM_FROM_NAME);
    $mail->addAddress($e_mail, $name);
    $mail->addReplyTo($e_mail, $name);

    // Content
    $mail->Subject = "[Tatleon Mail Service] --- Codigo de Verificacion";
    $mail->Body    = <<<EOT
        Estimado(a) {$name}:
        ------------------------------------
        Se ha solicitado la creacion de una cuenta en la plataforma Tatleon con el correo: {$e_mail}
        Su código de verificación es: {$codigo_verificacion}
        Si Ud. no ha solicitado la creacion de una cuenta en esta plataforma, omita este mensaje.
        ------------------------------------ 
        Hasta luego.
        EOT;

    $mail->send();
} catch (Exception $e) {
    echo " An error occurred while trying to send your message: " . $mail->ErrorInfo;
}


$conexion->desconectar();

exit;
