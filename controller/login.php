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
        //from usuarios_escuela get all the schools where he studies
        $escuelas = "SELECT UE.escuela_id as id, E.nombre 
            FROM Usuario_Escuela UE, Escuelas E 
            WHERE usuario_id =" . $row['id'] . " AND UE.escuela_id = E.id";
        $resultados_escuelas = $conexion->ejecutar($escuelas);
        $escuelas_array = array();
        while ($row_escuelas = mysqli_fetch_array($resultados_escuelas)) 
        {
            $escuelas_array[] = $row_escuelas;
        }

        $user = new User($row["id"], $row["nombres"], $row["apellidos"], $row["email"], 
            $row["permisos"], $username, $row["es_docente"]);
        
        $user->setEscuelasId($escuelas_array);

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
