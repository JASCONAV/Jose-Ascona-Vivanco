$(function() {
    $("#btn_buscar_solicitante").click(function() {
        var parametros = {
            "ruc": $("#inputRuc").val()
        };
        $.ajax({
            data: parametros,
            url: 'lista_documento_cotizacion',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $(".cotizacion_cuerpo").html("<div class='alert alert-error'><strong>Oh error!</strong> Usuario no válido.....!</div>");
            },
            error: function() {
            }
        });
    });
});

$(function() {
        $(".inputCalendar").datepicker({
            defaultDate: "+1w",
            numberOfMonths: 1
        });
    });