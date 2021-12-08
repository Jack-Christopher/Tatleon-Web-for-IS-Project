<?php 
    require_once('../../controller/templates.php'); 
    require_once('../../database/conexion.php');
    require_once('../../app/models/user.php');
    session_start();
?>

<!DOCTYPE html>
<html>

<?php print_header('Registro de Docentes', '', '', '../../public/favicon.ico'); ?>

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
  $Conn = new Conexion();
  $Conn->conectar();
  $sql = "SELECT id, nombres, apellidos
        FROM Usuarios
        WHERE es_docente = True";

  $docentes = $Conn->ejecutar($sql);
  ?>


  <div class="container">

    <?php
    if ($docentes != null) 
    {
      foreach ($docentes as $docente) {
        echo "<h2 class='display-6'> " . $docente['id'] . " | " . $docente['apellidos'] . ", " . $docente['nombres'] . "</h2>";
    ?>

        <table class="table table-hover table-bordered">
          <thead>
            </tr>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Comentario</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $comentarios_sql = "SELECT id, comentario
                  FROM Comentarios
                  WHERE docente_id = " . $docente['id'];

            $comentarios = $Conn->ejecutar($comentarios_sql);
            if ($comentarios != null) {
              foreach ($comentarios as $comentario) {
                echo "<tr>";
                echo "<th scope='row'>" . $comentario['id'] . "</th>";
                echo "<td>" . $comentario['comentario'] . "</td>";
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
    <?php
    if (isset($_SESSION['user'])) 
    {
        $user = $_SESSION['user'];
        if ($user->permisos == Administrador || $user->permisos == Docente)  
        {
          echo "<div class='container'>";
          echo "<a href='add_comment.php?id=" . $docente['id'] . "' class='btn btn-secondary'>Agregar Comentario</a>";
          echo "</div>";
          echo "<br><br>";
        }
      }
      }
    }
    ?>
  </div>


  

  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>

</body>

</html>