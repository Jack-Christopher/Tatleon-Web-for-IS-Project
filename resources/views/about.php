<?php require_once('../../controller/templates.php'); ?>

<!DOCTYPE html>
<html>

<?php print_header('Acerca', '', '', 'favicon.ico'); ?>

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

    <!-- Main -->
  <div class="container">
    <br><br><br>
    <div class="alert alert-primary" role="alert">
      <h1 class="display-3" align="center">Acerca</h1>

      <h2>Tatleon</h2>
      <p>
        Tatleon es un sitio web que permite a los usuarios tanto estudiantes como docentes de la Universidad Nacional de San Agustín, 
        poder acceder a una serie de servicios muy útiles para un mejor desenvolvimiento en la Universidad, de poder crear 
        recursos y modificarlos.
        Además de extender este acceso en modo de solo lectura para cualquier persona que pueda acceder a la página.
      </p>
      <h2>Servicios</h2>
      <p>
        Tatleon ofrece sus servicios de forma gratuita para que los estudiantes y docentes de la Universidad Nacional de San Agustín
        y cualquier otra persona puedan acceder a ellas libremente y puedan aportar tanto en cuanto puedan con este proyecto.
      </p>
    </div>

    <br>
    <div class="alert alert-primary" role="alert">
      <h2 align="center"> Equipo de Trabajo</h2>
      <h4>The Delta Team</h4>
      <p>
        Este proyecto fue desarrollado por los estudiantes miembros de "The Delta Team" de la carrera de Ciencias de la Computación
        de la Universidad Nacional de San Agustín, el cual se empezó en la segunda mitad del año 2021.
      </p>
    </div>
    <br><br><br>


    <div class="container">
      <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
      <br><br>
    </div>
</body>

</html>