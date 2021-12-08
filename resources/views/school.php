<?php 
    require_once('../../controller/templates.php'); 
    require_once('../../database/conexion.php');
    require_once('../../app/models/user.php');
    session_start();

    $Conn = new Conexion();
    $Conn->conectar();
    $escuela_id = $_GET['id'];

    $escuela = "SELECT nombre FROM Escuelas WHERE id=$escuela_id";
    $escuela_nombre = mysqli_fetch_array($Conn->ejecutar($escuela))['nombre'];
?>

<!DOCTYPE html>
<html>

<?php print_header("Enlaces de " . $escuela_nombre, '', '', '../../public/favicon.ico'); ?>

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




<!-- Table of Schools -->

<?php
  $sql = "SELECT L.id, L.nombre, L.descripcion, L.url
        FROM Enlaces L
        WHERE L.escuela_id=$escuela_id";

  $enlaces = $Conn->ejecutar($sql);
  ?>

  <div class="container">
    <h1 class="display-3"> Enlaces de <?php echo $escuela_nombre; ?> </h1>
    <br>

    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Enlace</th>
        </tr>

      </thead>
      <tbody>
        <?php
        if ($enlaces != null) 
        {
          foreach ($enlaces as $row) 
          {
            echo "<tr>";
            echo "<th scope=\"row\">" . $row['id'] . "</th>";
            echo "<td>" . $row['nombre'] . "</td>";

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
        $escuelas = "SELECT UE.escuela_id
            FROM Usuario_Escuela UE
            WHERE UE.usuario_id = ".$_SESSION['user']->id;

        $result = $Conn->ejecutar($escuelas);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $escuela_propia = false;
        foreach ($rows as $row) 
        {
            if ($row['escuela_id'] == $escuela_id) 
            {
                $escuela_propia = true;
            }            
        }

        if ($escuela_propia) 
        {
            echo "<div class=\"container\" align=\"right\">";
            echo "<a href=\"add_link.php?id=" . $escuela_id . "\" class=\"btn btn-outline-success\"> Agregar enlace </a>";
            echo "<br>";
            echo "</div>";
        }
        else
        {
            echo "<div class=\"container\" align=\"right\">";
            echo "<p class=\"text-muted\"> El ingreso  de datos es solo para los estudiantes de esta escuela </p>";
            echo "<br>";
            echo "</div>";
        }
    }
    else 
    {
        echo "<div class=\"container\" align=\"right\">";
        echo "<p class=\"text-muted\"> Inicia sesión para agregar enlaces </p>";
        echo "<a href=\"login.php\" class=\"btn btn-outline-success\"> Iniciar sesión </a>";
        echo "<br>";
        echo "</div>";
    }
  ?>


  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>

</body>

</html>