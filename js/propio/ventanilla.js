function buscar_documento()
{
    var parametros = {
        "id": $("#inputSolicitante").val()
    };
    $.ajax({
        data: parametros,
        url: 'consultar_PreEvaluacion',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            $(".caja_resul").html(data);
        },
        error: function() {
        }
    });
}