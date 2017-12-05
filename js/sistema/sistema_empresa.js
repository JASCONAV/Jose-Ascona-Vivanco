$("#dialog_crear_empresa").dialog(
        {
            height: '520',
            width: '350',
            autoOpen: false
        });

function ver_dialog()
{
    $.ajax({
        url: 'c_sistema/crear_empresa',
        success: function(data) {
            $("#dialog_crear_empresa").dialog("open");
            $('#dialog_crear_empresa').html(data);
        }
    });
}
function cerrar_modal(option)
{
    switch (option) {
        case 1:
            tooltips.tooltip("close");
            $("#dialog_crear_empresa").dialog("close");
            break;
    }
}

function eliminar_empresa(ruc) {
    var parametros = {
        "ruc": ruc
    };
    $.ajax({
        data: parametros,
        url: 'c_sistema/eliminar_empresa',
        type: 'post',
        async: false,
        beforeSend: function() {
            //$("#v_crear_empresa_resultado").html("Procesando, espere por favor...");
        }, success: function(response) {
            //$("#v_crear_empresa_resultado").html(response)
            $('#v_crear_empresa_resultado').html("<div class='alert alert-success'> Eliminado correctamente.</div>");
            window.location.reload();
        }, error: function() {
            $('#v_crear_empresa_resultado').html("<div class='alert alert-error'> Comunicar a sistema de este error.</div>");
            //alert("Error");
        }
    });
}