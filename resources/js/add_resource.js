function formEsValido() 
{
    var link = $("#link");
    var descripcion = $("#description");

    if (link.val() == "") 
    {
        alertify.alert("Debe colocar el enlace").setHeader("Atención");
        return false;
    }
    else if (descripcion.val() == "") 
    {
        alertify.alert("Debe colocar la descripción del recurso.").setHeader("Atención");
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
            cadena = $("#add_resource_form").serialize();
            $.ajax({
                type: 'POST',
                url: "../../controller/add_resource.php",
                data: cadena,

                success: function(data) 
                {
                    alertify.alert(data).setHeader("Atención");
                    if (data == 0) 
                    {
                        alertify.alert('Hecho', 'Registro de recurso exitoso!', function() {
                            location.href = "javascript:history.go(-1)";
                        });
                    }
                    else if (data == 1) 
                    {
                        alertify.error("Hubo un inconveniente. Inténtelo más tarde.");

                    }
                    else 
                    {
                        alertify.error("Hubo un inconveniente. Inténtelo más tarde.");
                    }
                }

            })
        }

    })
})