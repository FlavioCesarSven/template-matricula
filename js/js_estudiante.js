init()
function init(){}


function abrirModal(){
    
    limpiarControles();

    setTimeout( function () {
        $('#inputNombre').focus();
    }, 1000 );
    
    $('#titulo_ventana').text('Agregar Estudiante');
    $('#inputAccion').val('Insert');
    $('#w_estudiante').modal({
        show: true,
        backdrop: 'static'
    });    

}

function guardarRegistro(){


        if( inputDni.length == 0 ){

            $('#msg').html('<div class="alert alert-danger" role="alert">Ingrese el DNI </div>').show(300).delay(2000).hide(300);

           
            $('#inputDni').focus();
            return false;
        }

        var inputApellidos = $('#inputApellidos').val();
        if( inputApellidos.length == 0 ){
        
            $('#msg').html('<div class="alert alert-danger" role="alert">Ingrese los Apellidos </div>').show(300).delay(2000).hide(300);

            $('#inputApellidos').focus();
            return false;
        }

        var inputNombres = $('#inputNombres').val();
        if( inputNombres.length == 0 ){
        
            $('#msg').html('<div class="alert alert-danger" role="alert">Ingrese los Nombres </div>').show(300).delay(2000).hide(300);

            $('#inputNombres').focus();
            return false;
        }

        var inputSexo = $('#inputSexo').val();
        if( inputSexo.length == null ){
        
            $('#msg').html('<div class="alert alert-danger" role="alert">Seleccione el Sexo </div>').show(300).delay(2000).hide(300);

            $('#inputSexo').focus();
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
        
            var ruta = "../controller/cEstudianteC.php";
            var formData = new FormData($('#frm_estudiante')[0]);

            $.ajax({
                type: 'POST',
                url: ruta,
                data: formData,
                contentType: false,
                processData : false,
                success: function (rpta){
                    alert( rpta )
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

function editarPrograma( idprog ){

    setTimeout( function () {
        $('#inputNombre').focus();
    }, 1000 );
    
    $('#titulo_ventana').text('Editar Programa');
    var ruta = "../controller/cProgramasC.php";
    var accion = "SelectByID";

    $.ajax({
        type: 'POST',
        url: ruta,
        data: 'inputAccion=' + accion + '&inputID='+ idprog,
        success: function (rpta)
        {

            datos = JSON.parse( rpta );

            $('#inputID').val( datos.idprograma );
            $('#inputNombre').val( datos.nomb_pro );
            $('#inputDesc').val( datos.desc_pro );

            if( datos.estd_pro == 'A' ){
                $('#inputEstado').attr('checked', true);
            }else{
                $('#inputEstado').attr('checked', false);
            }

            $('#inputAccion').val('Update');

            $('#w_estudiante').modal({
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
    $('#frm_estudiante')[0].reset();
}

function eliminarRegistro(idprog){
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
        
            var ruta = "../controller/cProgramasC.php";
            var accion = "Delete";

            $.ajax({
                type: 'POST',
                url: ruta,
                data: 'inputAccion=' + accion + '&inputID='+ idprog,
                success: function (rpta){
                  alert(rpta);
                  actualizarPagina();
                }
            });
        }
      });
}