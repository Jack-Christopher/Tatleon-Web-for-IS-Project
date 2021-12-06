<?php 
    require_once('controller/templates.php'); 
    require_once('database/conexion.php');
    session_start();
    
    if (isset($_GET['logout'])) 
    {
        if ($_GET['logout'] == "true") 
        {
          session_destroy();
          header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html>

<?php print_header('Tatleon Web', 'index.css', '', 'favicon.ico'); ?>

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
                    <li><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li><a class="nav-link" href="resources/views/services.php">Servicios</a></li>
                    <li><a class="nav-link" href="resources/views/support.php">Soporte</a></li>
                    <li><a class="nav-link" href="resources/views/about.php">Acerca </a></li>                    
                </ul>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    <a class="nav-link" href="resources/views/services.php">Servicios</a>
                    <a class="nav-link" href="resources/views/support.php">Soporte</a>
                    <a class="nav-link" href="resources/views/about.php">Acerca </a>
                </div>
            </div>
        </div>
    </nav>

    <br>

    <div class="container" align="center" style="padding:2%;">
        <img src="resources/img/unsa_logo.png" alt="UNSA Logo" id="logo">
    </div>


    <?php
    if (isset($_SESSION['id'])) 
    {
        $Conn =  new Conexion;
        $Conn->conectar();
        $nombre_sql = "SELECT nombres FROM usuarios WHERE id = '".$_SESSION['id']."'";
        $row = $Conn->ejecutar($nombre_sql)->fetch_array();
        $nombre = $row['nombres'];

        echo "<br>";
        echo "<div class=\"container\" align=\"center\">";
        echo "<h3 class=\"display-2\" > Bienvenido(a) " . $nombre . "</h3>";
        echo "</div>";
    }
    else 
    {
        echo "<div class=\"container\" align=\"center\">";
        echo "<a href=\"resources/views/login.php\" class=\"btn btn-outline-primary\" id=\"btn_login\" style=\"margin:3%;\"> Iniciar Sesión </a>";
        echo "<a href=\"resources/views/register.php\" class=\"btn btn-outline-success\" id=\"btn_register\" style=\"margin:3%;\"> Registrarse </a>";
        echo "</div>";
    }
    ?>


    <!-- Servicios -->
    <div class="container" align="center" style="padding:2%;">
    <br>

    <div class="container" id="button_box">
        <br><br>
        <div class="container" align="center">
            <a href="resources/views/link_repository.php" class="btn btn-primary index_button"> Repositorio de Enlaces</a>
            <a href="resources/views/teacher_record.php" class="btn btn-danger index_button"> Registro de Docentes</a>
            <a href="resources/views/shared_resources.php" class="btn btn-warning index_button"> Recursos Compartidos</a>
            <br>
            <a href="#" class="btn btn-primary index_button"> Coming soon... </a>
            <a href="#" class="btn btn-danger index_button"> Coming soon... </a>
            <a href="#" class="btn btn-warning index_button"> Coming soon... </a>
            <br>
            <a href="#" class="btn btn-primary index_button"> Coming soon... </a>
            <a href="#" class="btn btn-danger index_button"> Coming soon... </a>
            <a href="#" class="btn btn-warning index_button"> Coming soon... </a>
        </div>
        <br><br>

    </div>
    <br><br>
    <div class="container" style="display: block;">
        Made by
        <img src="resources/img/equipo_logo.jpg" alt="The Delta Team Logo" id="TDT_logo">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        if (isset($_SESSION['id'])) 
        {
            echo "<button class='btn btn-dark' id='logout_button' onclick='logout()'> Cerrar Sesion</button>";
        }
        ?>
    </div>


</body>


</html>

<script>
  function logout() 
  {
    location.href = "index.php?logout=true";
  }
</script>