function formEsValido() 
{
    var nombres = $("#name");
    var apellidos = $("#last_name");
    // var escuela = $("#school");
    var correo_electronico = $("#e_mail");
    var nombre_de_usuario = $("#user_name");
    var clave_de_usuario = $("#password");
    var clave_de_usuario2 = $("#password_again");

    var emailRegex = new RegExp('.*@unsa.edu.pe');

    if (nombres.val() == "") 
    {
        var op = alertify.alert("Debe colocar sus nombres.");
        return false;
    }
    else if (apellidos.val() == "") 
    {
        var op = alertify.alert("Debe colocar sus apellidos.");
        return false;
    }

    else if (correo_electronico.val() == "") 
    {
        var op = alertify.alert("Debe colocar su correo electrónico.");
        return false;
    }
    else if (!emailRegex.test(correo_electronico.val())) 
    {
        var op = alertify.alert("Debe usar un Correo Institucional.");
        return false;
    }
    else if (nombre_de_usuario.val() == "") 
    {
        var op = alertify.alert("Debe colocar su nombre de usuario.");
        return false;
    }
    else if (clave_de_usuario.val() == "") 
    {
        var op = alertify.alert("Debe colocar su clave de usuario.");
        return false;
    }
    else if (clave_de_usuario2.val() == "") 
    {
        var op = alertify.alert("Debe colocar su clave de usuario otra vez.");
        return false;
    }
    else if (clave_de_usuario.val() != clave_de_usuario2.val()) 
    {
        var op = alertify.alert("Las clave de usuario deben coincidir.");
        return false;
    }

    return true;
}


$(document).ready(function() 
{
    $('#submit_button').click(function() 
    {
        if (formEsValido()) 
        {
            cadena = $("#signup_form").serialize();

            $.ajax({
                type: "POST",
                url: '../../controller/register.php',
                data: cadena,
                success: function(data) 
                {
                    if (data == 0) 
                    {
                        window.location.replace('verification.php');
                    }
                    else if (data == 3) 
                    {
                        alertify.alert("El nombre de usuario ya existe.");
                    }
                    else 
                    {
                        alertify.alert("No se pudo completar el proceso.");
                        // alertify.alert(data);
                    }
                }
            });
            //this is mandatory otherwise your form will be submitted.
            return false;
        }
    });

});
