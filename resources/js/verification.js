function formEsValido() 
{
    var codigo = $("#verification_code");
    var user_name = $("#username");

    if (codigo.val() == "") 
    {
        var op = alertify.alert("Debe colocar su codigo de verificacion.");
        return false;
    }
    else if (user_name.val() == "") 
    {
        var op = alertify.alert("Debe haberse registrado previamente.");
        return false;
    }

    return true;
}


$(document).ready(function() 
{
    $('#button_submit').click(function() 
    {
        if (formEsValido()) 
        {
            cadena = $("#verification_form").serialize();

            $.ajax({
                type: "POST",
                url: '../../controller/verification.php',
                data: cadena,
                success: function(data) 
                {
                    if (data == 0) 
                    {
                        alertify.alert('Hecho', 'Registro de usuario completado exitosamente!', function() {
                            location.href = "../../index.php";
                        });
                    }
                    else if (data == 1) 
                    {
                        alertify.alert("No se pudo registrar al usuario.");
                    } 
                    else if (data == 2) 
                    {
                        alertify.alert("No se pudo completar el proceso.");
                    } 
                    else if (data == 3) 
                    {
                        alertify.alert("Ocurrió un error inesperado. Inténtelo más tarde.");
                    } 
                    else if (data == 4) 
                    {
                        var op = alertify.alert("El código de verificación es incorrecto.");
                    }
                    else 
                    {
                        alertify.alert("Ocurrió un error inesperado. Inténtelo más tarde.");
                    }
                }
            });
            //this is mandatory other wise your from will be submitted.
            return false;
        }
    });

});