function salir_sistema() {
    $.ajax({
        url: 'c_principal/salir_sistema',
        type: 'post',
        async: true,
        beforeSend: function() {
        },
        success: function(data) {
            //$("#Lista_usuario").html(data);
            location.href="http://cedessi.com/tesis";
        },
        error: function() {
            $.ajax({
                url: 'salir_sistema',
                type: 'post',
                async: true,
                beforeSend: function() {
                },
                success: function(data) {
                    //$("#Lista_usuario").html(data);
                    location.href="http://cedessi.com/tesis";
                },
                error: function() {
				$.ajax({
                url: 'index.php/c_principal/salir_sistema',
                type: 'post',
                async: true,
                beforeSend: function() {
                },
                success: function(data) {
                    //$("#Lista_usuario").html(data);
                    location.href="http://cedessi.com/tesis";
                },
                error: function() {
                }
            });
                }
            });
        }
    });
}