<?php
    require_once("../database/conexion.php");
    require_once("../app/models/user.php");
    session_start();
    
    $docente_id = $_POST['docente_id'];
    $comentario = $_POST['comment'];

    $Conn = new Conexion();
    $Conn->conectar();

    $docente = "SELECT nombres FROM Usuarios WHERE id = '$docente_id' AND es_docente = true";
    $result = $Conn->ejecutar($docente);
    $nombres = "N";
    $apellidos = "N";
    if ($result->num_rows > 0) 
    {
        $sql = "INSERT INTO Comentarios (comentario, docente_id) VALUES ('$comentario', '$docente_id')";
        $result = $Conn->ejecutar($sql);

        if($result)
        {
            echo 0;
        }
        else
        {
            echo 1;
        }
    }
    else
    {
        $sql = "INSERT INTO Comentarios (comentario, docente_id) VALUES ('$comentario', -1)";
        $result = $Conn->ejecutar($sql);
        echo 2;
    }    
    
    $comment_id = $Conn->last_id();

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $Conn->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['user']->id .", 'Comentarios', " .$comment_id .", '" . $dt ."')";
    $result3 = $Conn->ejecutar($sql3);    