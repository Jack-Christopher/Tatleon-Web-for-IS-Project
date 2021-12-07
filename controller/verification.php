<?php
    session_start();
    require_once("../database/conexion.php");

    $conexion = new Conexion;
    $conexion->conectar();

    $codigo = $_POST["verification_code"];
    $username = $_POST["username"];

    $verificar = "SELECT id, nombres, apellidos, email, username, clave
                FROM temp_Usuarios
                WHERE codigo_verificacion = '$codigo' AND
                    username = '$username';";

    $verify = $conexion->ejecutar($verificar);
    if(mysqli_num_rows($verify) > 0)
	{
        $verificacion = mysqli_fetch_array($verify);
        $nombres = $verificacion["nombres"];
        $apellidos = $verificacion["apellidos"];
        $email = $verificacion["email"];
        $username = $verificacion["username"];
        $clave = $verificacion["clave"];

        $usuario = "INSERT INTO Usuarios (nombres, apellidos, email, username, clave, permisos, es_docente)
            VALUES ('$nombres', '$apellidos', '$email', '$username', '$clave', 0, 0);";
        // se elimina de la tabla temporal del usuario porque ya se ha verificado y es oficial
        $FreeTempTable = "DELETE FROM temp_Usuarios WHERE username = '$username';";
        
        $result = $conexion->ejecutar($usuario);        
        $result2 = $conexion->ejecutar($FreeTempTable);
        if ($result && $result2)
        {
            echo 0;
        }
        else if (!$result)
        {
            echo 1;
        }
        else if (!$result2)
        {
            echo 2;
        }
        else
        {
            echo 3;
        }
    }
    else
    {
        echo 4;
    }

    $conexion->desconectar();
    exit;
