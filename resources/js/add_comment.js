function formEsValido() 
{
    var comentario = $("#comment");
    if (comentario.val() == "") 
    {
        alertify.alert("Debe colocar un comentario").setHeader("Atención");
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
            cadena = $("#add_comment_form").serialize();
            $.ajax({
                type: 'POST',
                url: "../../controller/add_comment.php",
                data: cadena,

                success: function(data) 
                {
                    if (data == 0) 
                    {
                        alertify.alert('Hecho', 'Registro de comentario exitoso!', function() {
                            location.href = "javascript:history.go(-1)";
                        });

                    }
                    else if (data == 1) 
                    {
                        alertify.error("No existe un docente con el id proporcionado.");
                    }
                    else if (data == 2)
                    {
                        alertify.alert('Hecho', 'Bien hecho. U_U', function() {
                            location.href = "../views/teacher_record.php";
                        });                        
                    }
                    else 
                    {
                        alertify.error(data);
                        alertify.error("Hubo un inconveniente. Inténtelo más tarde.");
                    }
                }

            })
        }

    })
})