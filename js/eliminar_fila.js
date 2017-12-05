$(document).on('click', '.clsEliminarFila', function() {
    /*obtener el cuerpo de la tabla; contamos cuantas filas (tr) tiene
     si queda solamente una fila le preguntamos al usuario si desea eliminarla*/
    var objCuerpo = $(this).parents().get(2);
    if ($(objCuerpo).find('tr').length == 1) {
        if (!confirm('Esta es el única fila de la lista ¿Desea eliminarla?')) {
            return;
        }
    }

    /*obtenemos el padre (tr) del td que contiene a nuestro boton de eliminar
     que quede claro: estamos obteniendo dos padres
     
     el asunto de los padres e hijos funciona exactamente como en la vida real
     es una jergarquia. imagine un arbol genealogico y tendra todo claro ;)
     
     tr	--> padre del td que contiene el boton
     td	--> hijo de tr y padre del boton
     boton --> hijo directo de td (y nieto de tr? si!)
     */
    var objFila = $(this).parents().get(1);
    /*eliminamos el tr que contiene los datos del contacto (se elimina todo el
     contenido (en este caso los td, los text y logicamente, el boton */
    $(objFila).remove();
});

//evento que se produce al hacer clic en el boton que elimina una tabla completamente
$(document).on('click', '.clsEliminarTabla', function() {
    var objTabla = $(this).parents().get(3);
    //bajamos la opacidad de la tabla hasta estar invisible
    $(objTabla).animate({'opacity': 0}, 500, function() {
        //eliminar la tabla
        $(this).remove();
    });
});