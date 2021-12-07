<?php
session_start();
require_once("../database/conexion.php");
require_once("../app/models/user.php");

$conexion = new Conexion;

$conexion->Conectar();

$username = $_POST["user_name"];
$password = $_POST["password"];


$usuarios = "SELECT id, nombres, apellidos, email, clave, permisos, es_docente
    FROM Usuarios WHERE username='$username'";

$resultados = $conexion->ejecutar($usuarios);


if (mysqli_num_rows($resultados) > 0) 
{
    $row = mysqli_fetch_array($resultados);
    $verify = password_verify($password, $row["clave"]);
    if ($verify) 
    {
        echo 0;

        $user = new User($row["id"], $row["nombres"], $row["apellidos"], $row["email"], 
            $row["permisos"], $username, $row["es_docente"]);

        $_SESSION["user"] = $user;
    } 
    else 
    {
        echo 1;
    }
}
else 
{
    echo 2;
}

$conexion->Desconectar();
exit;
