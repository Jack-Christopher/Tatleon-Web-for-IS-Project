function formEsValido() 
{
    var nombre_de_usuario = $("#user_name");
    var clave_de_usuario = $("#password");

    if (nombre_de_usuario.val() == "") 
    {
        var op = alertify.alert("Debe colocar su nombre de usuario.").setHeader("Atención");
        return false;

    }
    else if (clave_de_usuario.val() == "") 
    {
        alertify.alert("Debe colocar su clave de usuario").setHeader("Atención");
        return false;
    }

    return true;
}

$(document).ready(function() 
{
    $("#submit_button").click(function() 
    {
        if (formEsValido()) 
        {
            cadena = $("#login_form").serialize();
            $.ajax({
                type: 'POST',
                url: "../../controller/login.php",
                data: cadena,

                success: function(data) 
                {
                    if (data == 0) 
                    {
                        alertify.alert('Hecho', 'Inicio de sesión exitoso', function() 
                        {
                            location.href = "../../index.php";
                        });
                    }
                    else if (data == 1) 
                    {
                        alertify.error("Contraseña incorrecta");
                    }
                    else if (data == 2) 
                    {
                        alertify.error("El usuario no existe.")
                    }
                    else 
                    {
                        alertify.error("Ha ocurrido un error: ")
                        alertify.error(data)
                    }
                }

            })
        }

    })
})