function consultaxoperador() {

        var parametros = {
            "fd": $('#inputFdesde').val(),
            "fh": $('#inputFhasta').val(),
            "param" : $('#selectAsunto').val()
        };
        $.ajax({
            data: parametros,
            url: 'Lista_Idusuario_documento',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $('#CUERPO_CONSULTA').html(data);
                $(".caja_resul").html("<div class='alert alert-info'><strong>Listo!</strong> Usuaario eliminado correctamente.....!</div>");
            },
            error: function() {
            }
        });
}

function consultaxtipoCArga() {

        var parametros = {
            "fd": $('#inputFdesde').val(),
            "fh": $('#inputFhasta').val(),
            "param" : $('#selectCarga').val()
        };
        $.ajax({
            data: parametros,
            url: 'Lista_Carga_documento',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $('#CUERPO_CONSULTA').html(data);
                $(".caja_resul").html("<div class='alert alert-info'><strong>Listo!</strong> Usuaario eliminado correctamente.....!</div>");
            },
            error: function() {
            }
        });
}

function consultaxSegunSolicitante() {
//alert($('#inputSolicitante').val());
        var parametros = {
            "fd": $('#inputFdesde').val(),
            "fh": $('#inputFhasta').val(),
            "param" : $('#inputSolicitante').val()
        };
        $.ajax({
            data: parametros,
            url: 'Lista_Solicitante_documento',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $('#CUERPO_CONSULTA').html(data);
                $(".caja_resul").html("<div class='alert alert-info'><strong>Listo!</strong> Usuaario eliminado correctamente.....!</div>");
            },
            error: function() {
            }
        });
}