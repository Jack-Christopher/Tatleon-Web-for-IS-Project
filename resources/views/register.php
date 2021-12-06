<?php 
    require_once('../../controller/templates.php'); 
    require_once('../../database/conexion.php');
?>

<!DOCTYPE html>
<html>

<?php print_header('Creación de Cuenta', '../css/login.css', '', 'favicon.ico'); ?>


<body background="../img/blue_background.jpg" style="background-size: cover">

    <?php
    $conexion = new Conexion();
    $conexion->conectar();
    $sql = "SELECT * FROM Escuelas";
    $result = $conexion->ejecutar($sql);
    ?>

    <div class="container" align="center">
        <br><br>
        <div class="jumbotron container_box" style="background:#cfe7ff">
            <!-- c3f6c3 -->
            <br><br>
            <div align="center">
                <img src="../img/register_icon.png" alt="Icono de registrarse" width="150" height="150">
                <h1 class="display-5"> Registrarse </h1>
            </div>
            <br>

            <form id="signup_form" align="left">
                <label for="name"> Nombres: </label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="last_name"> Apellidos: </label>
                <input type="text" name="last_name" id="last_name" class="form-control">
                <br>
                <label for="escuela"> Escuela Profesional: </label>
                <select name="school" id="school">
                    <option value="null"> Elija su escuela ... </option>
                    <?php
                    while ($escuela = mysqli_fetch_array($result)) {
                    ?>
                        <option value=" <?php echo $escuela['id']; ?>"> <?php echo $escuela['nombre']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <label for="e_mail"> Correo Electrónico: </label>
                <input type="email" name="e_mail" id="e_mail" class="form-control">
                <label for="user_name"> Nombre de Usuario: </label>
                <input type="text" name="user_name" id="user_name" class="form-control">
                <label for="password"> Contraseña </label>
                <input type="password" name="password" id="password" class="form-control">
                <label for="password_again"> Repite tu contraseña </label>
                <input type="password" name="password_again" id="password_again" class="form-control">

                <br>

                <div align="right">
                    <button type="button" id="submit_button" class="btn btn-success"> Registrarse </button>
                </div>

            </form>
            <br> ¿Ya tienes una cuenta?
            <a href="login.php"> Inicia Sesión </a>
            <br><br>
        </div>
        <br>


    </div>

    <div class="container">
        <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
        <br><br>
    </div>

</body>

</html>
