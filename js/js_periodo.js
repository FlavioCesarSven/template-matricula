init()
function init(){

}

function abrirModal(){
    
    setTimeout( function () {
        $('#inputNombre').focus();
    }, 1000 );

    $('#titulo_ventana').text('Agregar Periodo');
    $('#inputAccion').val('Insert');
    $('#w_periodo').modal({
        show: true,
        backdrop: 'static'
    });    
    
}

function guardarRegistro(){
    var nombre = $('#inputNombre').val();
    if( nombre.length == 0 ){
       
        $('#msgenvio').html('<div class="alert alert-danger" role="alert">Ingrese el Nombre </div>').show(300).delay(2000).hide(300);

        $('#inputNombre').focus();
        return false;
    }

    Swal.fire({
        title: 'Seguro de Guardar los cambios?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
        
            var ruta = "../controller/cPeriodoC.php";

            var formData = new FormData($('#frm_programa')[0]);

            $.ajax({
                type: 'POST',
                url: ruta,
                data: formData,
                contentType: false,
                processData : false,
                success: function (rpta){
                    if (rpta =='OK') {
                        Swal.fire(
                         'Sistema de Matricula!',
                         'Registro Guardado',
                         'success'
                      );  
                         limpiarControles();
                     }
                }
            });
        }
      });

    return false;
}

function editarPrograma( idoper ){
    setTimeout( function () {
        $('#inputNombre').focus();
    }, 1000 );
    
    $('#titulo_ventana').text('Editar Periodo');
    var ruta = "../controller/cPeriodoC.php";
    var accion = "SelectByID";

    $.ajax({
        type: 'POST',
        url: ruta,
        data: 'inputAccion=' + accion + '&inputID='+ idoper,
        success: function (rpta)
        {

            datos = JSON.parse( rpta );

            $('#inputID').val( datos.idperiodo );
            $('#inputNombre').val( datos.nomb_per );
            $('#inputFinicio').val( datos.fini_per);
            $('#inputFinal').val( datos.ffin_per);

            if( datos.estd_pro == 'A' ){
                $('#inputEstado').attr('checked', true);
            }else{
                $('#inputEstado').attr('checked', false);
            }

            $('#inputAccion').val('Update');

            $('#w_periodo').modal({
                show: true,
                backdrop: 'static'
            });  
        }
    });  
    
}

function actualizarPagina(){
    window.location.reload();
}

function limpiarControles(){
    $('#frm_programa')[0].reset();
}

function eliminarRegistro(idoper){
    Swal.fire({
        title: 'Sistema de Matricula',
        text: "¿Seguro de Eliminar el Registro?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
        
      }).then((result) => {
        if (result.isConfirmed) {
        
            var ruta = "../controller/cPeriodoC.php";
            var accion = "Delete";

            $.ajax({
                type: 'POST',
                url: ruta,
                data: 'inputAccion=' + accion + '&inputID='+ idoper,
                success: function (rpta){
                  alert(rpta);
                  actualizarPagina();
                }
            });
        }
      });
}