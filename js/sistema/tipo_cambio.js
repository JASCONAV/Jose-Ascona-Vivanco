$("#dialog_ingresar_tipo_cambio").dialog(
        {
            height: '235',
            width: '350',
            autoOpen: false
        });

function ver_dialog()
{
    $.ajax({
        url: 'ver_tipo_cambio',
        success: function(data) {
            $("#dialog_ingresar_tipo_cambio").dialog("open");
            $('#dialog_ingresar_tipo_cambio').html(data);
        }
    });
}
function cerrar_modal(option)
{
    switch (option) {
        case 1:
            tooltips.tooltip("close");
            $("#dialog_ingresar_tipo_cambio").dialog("close");
            break;
    }
}

function eliminar_tipo_cambio(id) {
    var parametros = {
        "id": id
    };
    $.ajax({
        data: parametros,
        url: 'eliminar_tipo_cambio',
        type: 'post',
        async: false,
        beforeSend: function() {
            //$("#v_crear_empresa_resultado").html("Procesando, espere por favor...");
        }, success: function(response) {
            //$("#v_crear_empresa_resultado").html(response)
            $('#v_tipo_cambio_resultado').html("<div class='alert alert-success'> Eliminado correctamente.</div>");
            window.location.reload();
        }, error: function() {
            $('#v_tipo_cambio_resultado').html("<div class='alert alert-error'> Comunicar a sistema de este error.</div>");
            //alert("Error");
        }
    });
}