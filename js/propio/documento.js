$(function() {
    $("#btn_buscar_solicitante").click(function() {
        var parametros = {
            "param": $("#inputbuscarRuc").val()
        };
        $.ajax({
            data: parametros,
            url: 'get_solicitante_documento',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $("#resul_cuerpo").html(data);
                //alert($("#inputSoliciNomb").val());''
                $("#inputRazonSocial").val($("#inputSoliciNomb").val()+" "+$("#inputSoliciAma").val()+" "+$("#inputSoliciApep").val());
                /*$("#inputAppaterno").val($("#inputSoliciApep").val());
                $("#inputApmaterno").val($("#inputSoliciAma").val());*/
                if ($("#inputSoliciNomb").val() == '') {
                    $(".caja_resul").html("<div class='alert alert-error'><strong>Ok!</strong> Solicitante no encontrado, por favor crear uno nuevo.....!</div>");
                }
            },
            error: function() {
                $(".caja_resul").html("<div class='alert alert-error'><strong>Oh error!</strong> Informe a sistema de error.....!</div>");
            }
        });
    });
});


$(function() {
    $("#BuscarDocumentoRecurrente").click(function() {
        var parametros = {
            "param": $("#inputTypeBuscarRecurrente").val()
        };
        $.ajax({
            data: parametros,
            url: 'm_get_recurrente_rd',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $("#resul_cuerpo").html(data);
                $("#inputNombreRecurrente").val($("#inputSoliciNomb").val());
                $("#inputPaternoRecurrente").val($("#inputSoliciApep").val());
                $("#inputMaternocurrente").val($("#inputSoliciAma").val());
            },
            error: function() {
            }
        });
    });
});

$(function() {
    $("#registrar_documento").click(function() {
        var vcio = '';
        $(":text").each(function(){	
            vcio = vcio + $(this).val();
        });
        //alert(vcio);
        vcio = vcio.replace($("#inputfecha").val(),''); 
        if(vcio != '')
        {
            var fecha_guar = $("#inputfecha").val();
            var parametros = {
                "nroDocumento": $("#inputnumero").val(),
                "fechaIngreso": $("#inputfecha").val(),
                "asunto": $("#selectAsunto").val(),
                "numeroFolios": $("#inputfolios").val(),
                //"nomUsu": $("#").val(), esto sale del sistema de login
                "recurrente_codRecu": $("#inputTypeBuscarRecurrente").val(),
                "solicitante_codSoli": $("#inputbuscarRuc").val(),
                //"usuario_nomUsu": $("#").val(),, esto sale del sistema de login
                "tipo_de_documento_codTipoDoc": $("#selectTipo").val(),
                "tipo_de_carga_codTipoCarga": $("#selectTipoCarga").val()
            };
            $.ajax({
                data: parametros,
                url: 'insertar_documento',
                type: 'post',
                async: false,
                beforeSend: function() {
                },
                success: function(data) {
                    //$("#resul_cuerpo").html(data);
                    $(".caja_resul").html("<div class='alert alert-success'><strong>Listo!</strong> Datos registrados correctamente.....!</div>");
                    $(":text").each(function(){	
                        $($(this)).val('');
                    });
                    $("#inputfecha").val(fecha_guar);
                    //this.document.reload();
                },
                error: function() {
                }
            });
        }else{
            alert('Completar los datos');
        }
    });
});


$(function() {
    $(".inputCalendar").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 1
    });
});

function hability_option(){
    //alert($("#selectAsunto").val());
    if($("#selectAsunto").val()==0){
        $('#selectTipoCarga').removeAttr('disabled');
    }else{
        $('#selectTipoCarga').attr('disabled', 'disabled');
    }
}