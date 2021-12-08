<?php 
    require_once('../../controller/templates.php');
    require_once('../../app/models/user.php');
    session_start();
?>


<!DOCTYPE html>
<html>

<?php print_header('Agregar enlace', '../css/login.css', '../js/add_link.js', '../../public/favicon.ico'); ?>

<body background="../img/blue_background.jpg" style="background-size: cover">
    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../img/link_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h1 class="display-5"> Agregar Enlace </h1>
                <br>
            </div>
            <form id="add_link_form" align="left">
                <label for="project_name"> Nombre del proyecto: </label>
                <input type="text" name="project_name" id="project_name" class="form-control">
                <label for="link"> Enlace: </label>
                <textarea type="text" name="link" id="link" class="form-control"></textarea>
                <label for="link_description"> Descripción: </label>
                <textarea type="text" name="link_description" id="link_description" class="form-control" rows="3"></textarea>
                <br>
                <input type="hidden" name="escuela_id" id="escuela_id" value="<?php echo $_GET['id']; ?>">
                <div align="right">
                    <button type="button" id="submit_button" class="btn btn-primary"> Agregar </button>
                </div>
            </form>
            <br>
        </div>
    </div>

    <br>

    <div class="container">
        <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
        <br><br>
    </div>
</body>