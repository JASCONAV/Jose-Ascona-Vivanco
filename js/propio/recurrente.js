function registrar_recurrente()
{if($("#inputruc").val() == '' || $("#inputNombre").val() == '' || $("#inputApMaterno").val() == ''
        || $("#inputAppaterno").val() == '' || $("#inputdireccion").val() == '' || $("#inputTelefono").val() == '')
        {
        alert("Completar los datos");
    }else
    {
    var parametros = {
        "inputNombre": $("#inputNombre").val(),
        "inputApMaterno": $("#inputApMaterno").val(),
        "inputAppaterno": $("#inputAppaterno").val(),
        "inputIdentificacio": $("#inputIdentificacio").val(),
        "selectTipoRecurrente": $("#selectTipoRecurrente").val(),
        "selectUbigueo": $("#selectUbigueo").val()
    };
    $.ajax({
        data: parametros,
        url: 'insertar_recurrente',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            //$("#resul_cuerpo").html(data);
            cargar_lista_recurrente();
            $(":text").each(function(){	
                $($(this)).val('');
            });
            $(".caja_resul").html("<div class='alert alert-success'><strong>Listo!</strong> Datos registrados correctamente.....!</div>");
        },
        error: function() {
        }
    });}
}

function cargar_lista_recurrente() {
    $.ajax({
        url: 'ListaRecurrente',
        type: 'post',
        async: true,
        beforeSend: function() {
        },
        success: function(data) {
            $("#ListaSolicitante").html(data);
            $(":text").each(function(){	
                $($(this)).val('');
            });
        },
        error: function() {
        }
    });
}

function eliminar_recurrente(id) {
    if(confirm("Está seguro de eliminar recurrente?")) 
    {
        var parametros = {
            "id": id
        };
        $.ajax({
            data: parametros,
            url: 'eliminar_recurrente',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                cargar_lista_recurrente();
                $(":text").each(function(){	
                    $($(this)).val('');
                });
                $(".caja_resul").html("<div class='alert alert-info'><strong>Listo!</strong> Usuaario eliminado correctamente.....!</div>");
            },
            error: function() {
            }
        });
    }
}

function editar_recurrente(id){
    var parametros = {
        "id": id
    };
    $.ajax({
        data: parametros,
        url: 'editar_recurrente',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            var elem = data.split('$#wer#$');
            $("#inputNombre1").val(elem[0]),
            $("#inputApMaterno1").val(elem[1]),
            $("#inputAppaterno1").val(elem[2]),
            $("#inputIdentificacio1").val(elem[3]),
            $("#selectTipoRecurrente1").val(elem[4]),
            $("#selectUbigueo1").val(elem[5])
        },
        error: function() {
        }
    });    
           
}

function update_recurrente(){
    var parametros = {
        "inputNombre": $("#inputNombre1").val(),
        "inputApMaterno": $("#inputApMaterno1").val(),
        "inputAppaterno": $("#inputAppaterno1").val(),
        "inputIdentificacio": $("#inputIdentificacio1").val(),
        "selectTipoRecurrente": $("#selectTipoRecurrente1").val(),
        "selectUbigueo": $("#selectUbigueo1").val()
    };
    $.ajax({
        data: parametros,
        url: 'update_recurrente',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            //$("#resul_cuerpo").html(data);
            cargar_lista_recurrente();
            $(":text").each(function(){	
                $($(this)).val('');
            });
            $('#ModalEditarUsuario').modal('hide');
            $(".caja_resul").html("<div class='alert alert-success'><strong>Listo!</strong> Datos actualizados correctamente.....!</div>");
        },
        error: function() {
        }
    });
}