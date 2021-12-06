<?php require_once('controller/templates.php'); ?>

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





    <!-- Servicios -->
    <div class="container" align="center" style="padding:2%;">
    <br>

    <div class="container" id="button_box">
        <br><br>
        <div class="container" align="center">
            <a href="#" class="btn btn-primary index_button"> Repositorio de Enlaces</a>
            <a href="#" class="btn btn-danger index_button"> Registro de Docentes</a>
            <a href="#" class="btn btn-warning index_button"> Recursos Compartidos</a>
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
    </div>


</body>






</html>