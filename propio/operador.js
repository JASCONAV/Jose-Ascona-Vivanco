$(function() {
    $("#BtnCambiarPass").click(function() {
        if($("#Npass").val() == $("#Rpass").val() && $("#Rpass").val() != '')
        {       
            var parametros = {
                "usuario": $("#usuario").val(),
                "Npass": $("#Npass").val()
            };
            $.ajax({
                data: parametros,
                url: 'actualizarPassOperador',
                type: 'post',
                async: false,
                beforeSend: function() {
                },
                success: function(data) {
                    $(".caja_resul").html("<div class='alert alert-success'><strong>Ok!</strong> Contraseña actualizada.....!</div>");
                },
                error: function() {
                }
            });
        }else{
            $(".caja_resul").html("<div class='alert alert-error'><strong>Oh error!</strong> Las contraseñas no cinciden.....!</div>");
        }
    });
});
