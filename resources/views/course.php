<?php 
    require_once('../../controller/templates.php'); 
    require_once('../../database/conexion.php');
    require_once('../../app/models/user.php');
    session_start();

    $Conn = new Conexion();
    $Conn->conectar();
    $curso_id = $_GET['id'];

    $curso = "SELECT nombre FROM Cursos WHERE id=$curso_id";
    $curso_nombre = mysqli_fetch_array($Conn->ejecutar($curso))['nombre'];
?>

<!DOCTYPE html>
<html>

<?php print_header($curso_nombre, '', '', '../../public/favicon.ico'); ?>

<body>
    <!-- Navbar con las opciones principales -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size:25px;">
        <div class="container-fluid">
            <a class="navbar-brand" id="navbar_title" style="font-size:25px;">Tatleon</a>
            <div class="dropdown" style="display: None;" id="dropdown_menu">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:25px;">
                    Tatleon
                </button>
                <ul class="dropdown-menu">
                    <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
                    <li><a class="nav-link" href="services.php">Servicios</a></li>
                    <li><a class="nav-link" href="support.php">Soporte</a></li>
                    <li><a class="nav-link" href="about.php">Acerca </a></li>                    
                </ul>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
                    <a class="nav-link" href="services.php">Servicios</a>
                    <a class="nav-link" href="support.php">Soporte</a>
                    <a class="nav-link" href="about.php">Acerca </a>
                </div>
            </div>
        </div>
    </nav>

    <br>


<?php
    $sql = "SELECT R.id, R.descripcion, R.url
        FROM Recursos R
        WHERE R.curso_id=$curso_id";
    $resultado = $Conn->ejecutar($sql);
?>

    <div class="container">
    <h1 class="display-3"> Recursos de: <?php echo $curso_nombre; ?> </h1>
    <br>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripción</th>
            <th scope="col">Enlace</th>
        </tr>

        </thead>
        <tbody>
        <?php
        if ($resultado != null) {
            foreach ($resultado as $row) {
            echo "<tr>";
            echo "<th scope=\"row\">" . $row['id'] . "</th>";

            echo "<td>" . $row['descripcion'] . "</td>";

            echo "<td> <a href=\"" .  $row['url'] . "\" class=\"btn btn-success\"> Visitar</a> </td>";
            echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
    </div>


    <?php

    if (isset($_SESSION['user'])) 
    {
        if ($_SESSION['user']->permisos == Administrador || $_SESSION['user']->permisos == Docente) 
        {
            echo "<div class=\"container\" align=\"right\">";
            echo "<a href=\"add_resource.php?id=" . $curso_id . "\" class=\"btn btn-outline-success\"> Agregar Recurso </a>";
            echo "<br>";
            echo "</div>";
        }
        else 
        {
            echo "<div class=\"container\" align=\"center\">";
            echo "<br>";
            echo "<p class=\"alert alert-danger\" role=\"alert\"> Solo los delegados pueden agregar Recursos </p>";
            echo "<br>";
            echo "</div>";
            echo "<br><br>";
        }
    }
    else 
    {
        echo "<div class=\"container\" align=\"right\">";
        echo "<p class=\"text-muted\"> Inicia sesión para agregar Recursos</p>";
        echo "<a href=\"login.php\" class=\"btn btn-outline-success\"> Iniciar sesión </a>";
        echo "<br>";
        echo "</div>";
        echo "<br><br>";
    }
?>



  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>


</body>

</html>