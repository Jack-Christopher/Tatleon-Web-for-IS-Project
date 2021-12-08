function formEsValido() 
{
    var nombre = $("#project_name");
    var link = $("#link");
    var descripcion = $("#link_description");
    var escuela = $("#school");
    if (nombre.val() == "") 
    {
        var op = alertify.alert("Debe colocar el nombre del proyecto.").setHeader("Atención");
        return false;
    }
    else if (link.val() == "") 
    {
        alertify.alert("Debe colocar el enlace").setHeader("Atención");
        return false;
    }
    else if (descripcion.val() == "") 
    {
        alertify.alert("Debe colocar la descripción del proyecto.").setHeader("Atención");
        return false;
    }
    else if (escuela.val() == "null") 
    {
        alertify.alert("Debe seleccionar una escuela.");
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
            cadena = $("#add_link_form").serialize();
            $.ajax({
                type: 'POST',
                url: "../../controller/add_link.php",
                data: cadena,
                success: function(data) 
                {
                    if (data == 0) 
                    {
                        alertify.alert('Hecho', 'Registro de enlace exitoso!', function() 
                        {
                            location.href = "javascript:history.go(-1)";
                        });
                    }
                    else if (data == 1) 
                    {
                        alertify.error("Hubo un inconveniente. Inténtelo más tarde.");

                    }
                    else if (data == 2)
                    {
                        alertify.error("Solo puede ingresar enlaces en la(s) escuela(s) en la(s) que estudia.");
                    }
                    else 
                    {
                        alertify.error("Erro indeterminado. Inténtelo más tarde.");
                    }
                }
            })
        }
    })
})