<?php
    require_once("../database/conexion.php");
    require_once("../app/models/user.php");
    session_start();
    
    $name = $_POST['project_name'];
    $descripcion = $_POST['link_description'];
    $link = $_POST['link'];
    $escuela_id = $_POST['escuela_id'];

    $escuela_propia = false;
    if (isset($_SESSION['user']))
    {
        foreach ($_SESSION['user']->escuelas  as $escuela) 
        {
            if ($escuela['id'] == $escuela_id) 
            {
                $escuela_propia = true;
            }            
        }
    }

    if ($escuela_propia)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "INSERT INTO Enlaces (nombre, descripcion, URL, escuela_id) VALUES ('$name', '$descripcion', '$link', $escuela_id)";
        // echo $sql;
        $result = $conexion->ejecutar($sql);

        if($result)
        {
            echo 0;
        }
        else
        {
            echo 1;
            exit();
        }

        $sql2 = "SELECT MAX(id) 'maximo' FROM Enlaces";
        $result2 = $conexion->ejecutar($sql2);
        $row = mysqli_fetch_array($result2);
        $link_id = $row['maximo'];

        $sql3 = "SELECT NOW() 'date_time'";
        $result3 = $conexion->ejecutar($sql3);
        $row3 = mysqli_fetch_array($result3);
        $dt = $row3['date_time'];

        $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['user']->id .", 'Enlaces', " .$link_id .", '" . $dt ."')";
        $result3 = $conexion->ejecutar($sql3);    
    }
    else
    {
        echo 2;
    }
