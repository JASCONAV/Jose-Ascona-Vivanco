function registrar_solicitante()
{
    if($("#inputruc").val() == '' || $("#inputNombre").val() == '' || $("#inputApMaterno").val() == ''
        || $("#inputAppaterno").val() == '' || $("#inputdireccion").val() == '' || $("#inputTelefono").val() == '')
        {
        alert("Completar los datos");
    }else
    {
        var parametros = {
            "inputruc": $("#inputruc").val(),
            "inputNombre": $("#inputNombre").val(),
            "inputApMaterno": $("#inputApMaterno").val(),
            "inputAppaterno": $("#inputAppaterno").val(),
            "inputdireccion": $("#inputdireccion").val(),
            "inputTelefono": $("#inputTelefono").val(),
            "tipo_solicitante": $("#tipo_solicitante").val(),
            "selectUbigueo": $("#selectUbigueo").val()
        };
        $.ajax({
            data: parametros,
            url: 'insertar_solicitane',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                //$("#resul_cuerpo").html(data);
                cargar_lista_solicitante();
                $(":text").each(function(){	
                    $($(this)).val('');
                });
                $(".caja_resul").html("<div class='alert alert-success'><strong>Listo!</strong> Datos registrados correctamente.....!</div>");
            },
            error: function() {
            }
        });
    }
}

function cargar_lista_solicitante() {
    $.ajax({
        url: 'ListaSolicitante',
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

function eliminar_solicitante(id) {
    if(confirm("Está seguro de eliminar solicitante?")) 
    {
        var parametros = {
            "id": id
        };
        $.ajax({
            data: parametros,
            url: 'eliminar_solicitante',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                cargar_lista_solicitante();
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

function editar_solicitante(id){
    var parametros = {
        "id": id
    };
    $.ajax({
        data: parametros,
        url: 'editar_solicitante',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            var elem = data.split('$#wer#$');
            $("#inputruc1").val(elem[0]),
            $("#inputNombre1").val(elem[1]),
            $("#inputApMaterno1").val(elem[2]),
            $("#inputAppaterno1").val(elem[3]),
            $("#inputdireccion1").val(elem[4]),
            $("#inputTelefono1").val(elem[5]),
            $("#tipo_solicitante1").val(elem[6]),
            $("#selectUbigueo1").val(elem[7])
        },
        error: function() {
        }
    });    
           
}

function update_solicitante(){
    var parametros = {
        "inputruc": $("#inputruc1").val(),
        "inputNombre": $("#inputNombre1").val(),
        "inputApMaterno": $("#inputApMaterno1").val(),
        "inputAppaterno": $("#inputAppaterno1").val(),
        "inputdireccion": $("#inputdireccion1").val(),
        "inputTelefono": $("#inputTelefono1").val(),
        "tipo_solicitante": $("#tipo_solicitante1").val(),
        "selectUbigueo": $("#selectUbigueo1").val()
    };
    $.ajax({
        data: parametros,
        url: 'update_solicitante',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            //$("#resul_cuerpo").html(data);
            cargar_lista_solicitante();
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