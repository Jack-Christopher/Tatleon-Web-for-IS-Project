<?php 
    require_once('../../controller/templates.php'); 
    require_once('../../database/conexion.php');
    require_once('../../app/models/user.php');
    session_start();
?>

<!DOCTYPE html>
<html>

<?php print_header('Recursos Compartidos', '', '', '../../public/favicon.ico'); ?>

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
  
  //valor por defecto de la consulta
  $sql = "SELECT id, nombre FROM Cursos";

    if (isset($_SESSION['user'])) 
    {
        $sql = "SELECT C.id, C.nombre 
            FROM Cursos C, Usuario_Escuela UE, Curso_Escuela CE
            WHERE CE.escuela_id = UE.escuela_id AND C.id = CE.curso_ID AND UE.usuario_ID = ".$_SESSION['user']->id;
    }

    if  (isset($_GET['escuela'])) 
    {
        if ($_GET['escuela'] == "all") 
        {
            $sql = "SELECT C.id, C.nombre FROM Cursos C, Curso_Escuela CE WHERE CE.curso_id = C.id GROUP BY C.id";
        }
        else
        {
            $sql = "SELECT C.id, C.nombre FROM Cursos C, Curso_Escuela CE WHERE CE.escuela_id =" . $_GET['escuela'] . " AND CE.curso_id = C.id GROUP BY C.id";
        }
    }


  $conexion = new Conexion();
  $conexion->conectar();  
  $resultado = $conexion->ejecutar($sql);
  ?>

  <div class="container">
    <br>
    <h1 class="display-3" style="text-align: center;"> 
    <?php
        if (isset($_GET['escuela'])) 
        {
            if ($_GET['escuela'] == "all")
            {
                echo "Todos los cursos";
            }
            else
            {
                echo "Cursos de " . $_GET['escuela'];
            }
        }
        else if (isset($_SESSION['user']))
        {
           echo "Cursos de la escuela";
        }
        else
        {
            echo "Todos los cursos";
        }
    ?>
    </h1>
    <br><br>

    <table class="table table-hover table-bordered">
      <thead>
        </tr>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Curso</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($resultado != null) {
          foreach ($resultado as $curso) {
            echo "<tr>";
            echo "<th scope='row'>" . $curso['id'] . "</th>";
            echo "<td>" . $curso['nombre'] . "</td>";
            echo "<td> ";
            echo "<a href=\"course.php?id=" . $curso['id'] . "\" class=\"btn btn-success\"> Explorar</a> ";
            echo "</td> </tr>";
          }
        }
        
        ?>

      </tbody>
    </table>

      <?php	
      if  (!isset($_GET['escuela'])) 
      {
         echo '<a href="shared_resources.php?escuela=all" class="btn btn-secondary"> Ver todos los cursos </a>';
      }
      else
      {
        if ($_GET['escuela'] == "all")
        {
          echo '<a href="shared_resources.php" class="btn btn-secondary"> Ver los cursos de mi escuela</a>';
        }
        else
        {
            echo '<a href="shared_resources.php?escuela=all" class="btn btn-secondary"> Ver todos los cursos </a>';
        }
      }
      ?>


  </div>

  <br>

  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>

</body>
</html>


