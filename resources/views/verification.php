<?php 
    require_once('../../controller/templates.php'); 
    require_once('../../app/models/user.php');
    session_start();
?>

<!DOCTYPE html>
<html>

<?php print_header('Verificacion', '../css/login.css', '../js/verification.js', '../../public/favicon.ico'); ?>


<body background="../img/blue_background.jpg" style="background-size: cover">

    <div class="container" align="center">
        <br><br>
        <div class="alert alert-dark" role="alert">
            Un mensaje ha sido enviado a su correo con un codigo de 6 dígitos para verificar su cuenta.
        </div>

        <br>

        <div class="jumbotron container_box" style="background:#cfe7ff">

            <div>
                <h3 class="display-4">Usuario: <?php echo $_SESSION['user']->username; ?></h3>
            </div>

            <form id="verification_form">
                <label for="verification_code"> Código de Verificación </label>
                <input type="text" name="verification_code" id="verification_code" class="form-control">
                <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['user']->username; ?>">
                <br>
                <input type="button" id="button_submit" value="Enviar" class="btn btn-success" align="right">
            </form>
        </div>

    </div>
</body>


<div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
</div>

</html>