<?php 
    require_once('../../controller/templates.php');
    require_once('../../app/models/user.php');
    require_once("../../app/models/header.php");
    require_once('../../database/conexion.php');
    session_start();
?>

<!DOCTYPE html>
<html>

<?php 
    $header = new Header('Agregar recurso', '../css/login.css', '../js/add_resource.js', '../../public/favicon.ico');
    print_header($header);
?>

<body background="../img/blue_background.jpg" style="background-size: cover">

    <?php
    $curso_id = $_GET['id'];
    $conexion = new Conexion();
    $conexion->conectar();
    $sql = "SELECT nombre FROM Cursos WHERE id = '$curso_id'";
    $result = $conexion->ejecutar($sql);
    $row = mysqli_fetch_array($result);
    $curso_nombre = $row['nombre'];
    ?>
    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../img/resource_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h3> <?php echo $curso_nombre; ?> </h3>
                <br>
            </div>

            <form id="add_resource_form" align="left">
                <label for="link"> Enlace: </label>
                <textarea type="text" name="link" id="link" class="form-control"></textarea>
                <label for="link_description"> Descripción: </label>
                <textarea type="text" name="link_description" id="link_description" class="form-control" rows="3"></textarea>
                <input type="hidden" name="curso_id" id="curso_id" value="<?php echo $curso_id; ?>">
                <br>

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

</html>