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

$(function() {
    
        $("#registrar_operador").click(function() {
           
    if($("#inputUsuario").val() == '' || $("#inputDni").val() == '' || $("#inputTelefono").val() == ''
            || $("#inputClave").val() == '' || $("#inputApMaterno").val() == '' || $("#inputAppaterno").val() == '')
            {
            alert("Completar los datos");
        }else
            {var parametros = {
                "inputUsuario": $("#inputUsuario").val(),
                "inputDni": $("#inputDni").val(),
                "inputClave": $("#inputClave").val(),
                "inputApMaterno": $("#inputApMaterno").val(),
                "inputAppaterno": $("#inputAppaterno").val(),
                "inputNombre": $("#inputNombre").val(),
                "inputNacimiento": $("#inputNacimiento").val(),
                "sexo": $("#sexo").val(),
                "inputTelefono": $("#inputTelefono").val(),
                "selectTipoUsuario": $("#selectTipoUsuario").val()
            };
            $.ajax({
                data: parametros,
                url: 'insertar_operador',
                type: 'post',
                async: false,
                beforeSend: function() {
                },
                success: function(data) {
                    //$("#resul_cuerpo").html(data);
                    cargar_lista_usuarios();
                    $(":text").each(function(){	
                        $($(this)).val('');
                    });
                    $(".caja_resul").html("<div class='alert alert-success'><strong>Listo!</strong> Datos registrados correctamente.....!</div>");
                },
                error: function() {
                }
            });}
        });
});

function cargar_lista_usuarios() {
    $.ajax({
        url: 'ListaUsuarios',
        type: 'post',
        async: true,
        beforeSend: function() {
        },
        success: function(data) {
            $("#Lista_usuario").html(data);
        },
        error: function() {
        }
    });
}

$(function() {
    $("#inputNacimiento").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 1
    });
});

function eliminar_usuario(id) {
    if(confirm("Está seguro de eliminar usuario?")) 
    {
        var parametros = {
            "idUsuario": id
        };
        $.ajax({
            data: parametros,
            url: 'eliminar_operador',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                cargar_lista_usuarios();
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
 
function editar_usuario(User){

    var parametros = {
        "idUsuario": User
    };
    $.ajax({
        data: parametros,
        url: 'editar_usuario',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            var elem = data.split('$#wer#$');
            $("#inputUsuario1").val(elem[0]),
            $("#inputDni1").val(elem[1]),
            $("#inputClave1").val(elem[2]),
            $("#inputApMaterno1").val(elem[3]),
            $("#inputAppaterno1").val(elem[4]),
            $("#inputNombre1").val(elem[5]),
            $("#inputNacimiento1").val(elem[6]),
            $("#sexo1").val(elem[7]),
            $("#inputTelefono1").val(elem[8]),
            $("#selectTipoUsuario1").val(elem[9])
        },
        error: function() {
        }
    });    
           
}

function update_datos(){
    var parametros = {
        "inputUsuario": $("#inputUsuario1").val(),
        "inputDni": $("#inputDni1").val(),
        "inputClave": $("#inputClave1").val(),
        "inputApMaterno": $("#inputApMaterno1").val(),
        "inputAppaterno": $("#inputAppaterno1").val(),
        "inputNombre": $("#inputNombre1").val(),
        "inputNacimiento": $("#inputNacimiento1").val(),
        "sexo": $("#sexo1").val(),
        "inputTelefono": $("#inputTelefono1").val(),
        "selectTipoUsuario": $("#selectTipoUsuario1").val()
    };
    $.ajax({
        data: parametros,
        url: 'update_datos',
        type: 'post',
        async: false,
        beforeSend: function() {
        },
        success: function(data) {
            //$("#resul_cuerpo").html(data);
            cargar_lista_usuarios();
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