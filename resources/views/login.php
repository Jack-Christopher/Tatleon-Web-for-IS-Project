<?php 
    require_once('../../controller/templates.php'); 
?>

<!DOCTYPE html>
<html>

<?php print_header('Inicio de Sesión', '../css/login.css', '../js/login.js', 'favicon.ico'); ?>


<body background="../img/blue_background.jpg" style="background-size: cover">

    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../img/login_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h1 class="display-5"> Iniciar Sesión </h1>
                <br>
            </div>

            <form id="login_form" align="left">
                <label for="user_name"> Nombre de Usuario: </label>
                <input type="text" name="user_name" id="user_name" class="form-control">
                <label for="password"> Contraseña </label>
                <input type="password" name="password" id="password" class="form-control">

                <br>

                <div align="right">
                    <button type="button" id="submit_button" class="btn btn-primary"> Iniciar Sesión </button>
                </div>
            </form>
            <br> ¿No tienes una cuenta?
            <a href="register.php"> Regístrate </a>
            <br>
        </div>
    </div>
    <br>


    <div class="container">
        <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
        <br><br>
    </div>
</body>

</html>

