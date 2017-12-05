$("#dialog_nuevo_usuario").dialog(
        {
            height: '525',
            width: '700',
            autoOpen: false
        });

function ver_dialog()
{
    $.ajax({
        url: 'vista_crear_usuario',
        success: function(data) {
            $("#dialog_nuevo_usuario").dialog("open");
            $('#dialog_nuevo_usuario').html(data);
        }
    });
}

function cerrar_modal(option)
{
    switch (option) {
        case 1:
            tooltips.tooltip("close");
            $("#dialog_nuevo_usuario").dialog("close");
            break;
    }
}

function eliminar_empleado(id) {
    var parametros = {
        "id": id
    };
    $.ajax({
        data: parametros,
        url: 'eliminar_usuario',
        type: 'post',
        async: false,
        beforeSend: function() {
            //$("#v_crear_empresa_resultado").html("Procesando, espere por favor...");
        }, success: function(response) {
            //$("#v_crear_empresa_resultado").html(response)
            $('#mensaje_resultado').html("<div class='alert alert-success'> Eliminado correctamente.</div>");
            window.location.reload();
        }, error: function() {
            $('#mensaje_resultado').html("<div class='alert alert-error'> Comunicar a sistema de este error.</div>");
            //alert("Error");
        }
    });
}