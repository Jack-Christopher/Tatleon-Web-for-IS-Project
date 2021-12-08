<?php 
    require_once('../../controller/templates.php');
    require_once('../../app/models/user.php');
    require_once('../../database/conexion.php');
    session_start();
?>


<!DOCTYPE html>
<html>

<?php print_header('Agregar comentario', '../css/login.css', '../js/add_comment.js', '../../public/favicon.ico'); ?>



<body background="../img/blue_background.jpg" style="background-size: cover">

    <?php
    $id = $_GET['id'];
    $Conn = new Conexion();
    $Conn->conectar();
    $docente = "SELECT nombres, apellidos FROM Usuarios WHERE id = '$id' AND es_docente = true";
    $result = $Conn->ejecutar($docente);
    $nombres = "N";
    $apellidos = "N";
    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
        }
    }
    ?>

    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../img/comment_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h6 class="display-6"> <?php echo $apellidos . ", " . $nombres; ?> </h6>
                <br>
            </div>
            <form id="add_comment_form" align="left">
                <label for="comment"> Comentario: </label>
                <textarea type="text" name="comment" id="comment" class="form-control" rows="5"> </textarea>
                <input type="hidden" name="docente_id" id="docente_id" value="<?php echo $id; ?>">
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