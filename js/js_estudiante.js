init()
function init(){
    cargarImagen();
}

function cargarImagen()
{
    //mostrar u ocultar boton
    $('#preview').hover(
            function ()
            {
                $(this).find('a').fadeIn();//muestra
            },
            function ()
            {
                $(this).find('a').fadeOut(); //oculta
            }
    );
    //abrir cuadro de dialogo utilizando el boton Cargar Imagen
    $('#openFile').on('click', function (e)
    {
        e.preventDefault();
        //al presionar el boton se abrira
        //la ventana para seleccionar el archivo
        $('#InputFile').click();//Examinar
    }
    );

    //Vista Previa de la Imagen Seleccionada
    $('input[type=file]').change(function ()
    {
        //obtener el nombre del archivo
        var nameFile = (this.files[0].name).toString();
        //obtener la extensión del archivo
        var extensiones = nameFile.substring(nameFile.lastIndexOf("."));
        //Preguntas si el tipo de archivo es diferente a los permitidos
        if (extensiones != ".jpg" && extensiones != ".png")
            //alert("El archivo de tipo: " + extensiones + " NO es válido");
            Swal.fire({
                icon: 'warning',
                title: 'Sistema Académico',
                text: 'El archivo de tipo: ' + extensiones + ' NO es válido!'
            });
        else //SI el archivo es valido
        {
            //Escribir el nombre del archivo en
            $('#info_file').text('');
            $('#info_file').text(nameFile);

            //cargar la imagen en el preview
            var reader = new FileReader();
            reader.onload = function (e)
            {
                $('#preview img').attr('src', e.target.result);
            }
            //ejecutar la accion
            reader.readAsDataURL(this.files[0]);
        }
    }
    );
}


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

function editarEstudiante( idestu ){

    setTimeout( function () {
        $('#inputDni').focus();
    }, 1000 );
    
    $('#titulo_ventana').text('Editar Estudiante');
    var ruta = "../controller/cEstudianteC.php";
    var accion = "SelectByID";

    $.ajax({
        type: 'POST',
        url: ruta,
        data: 'inputAccion=' + accion + '&inputID='+ idestu,
        success: function (rpta)
        {
            // alert( rpta );
            datos = JSON.parse( rpta );

            $('#inputID').val(datos.idestudiante);
            $('#inputDni').val(datos.ndni_est);
            $('#inputApellidos').val(datos.apel_est);
            $('#inputNombres').val(datos.nomb_est);
            $('#inputFecNac').val(datos.fnac_est);
            $('#inputSexo').val(datos.sexo_est);
            $('#inputDireccion').val(datos.dire_est);
            $('#inputEmail').val(datos.cins_est);
            $('#inputPrograma').val(datos.idprograma);
            $('#inputOperador').val(datos.idoperador);
            $('#inputMovil').val(datos.ncel_est);
            $('#inputUbigeo').val(datos.idubigeo);
            $('#inputUbigeo').selectpicker('refresh');
            //recuperar imagen
            $('#mi_imagen').attr('src', '../' + datos.foto_est);
            $('#InputOculto').val(datos.foto_est);

            //checkbox, se activa segun el valor del campo
            if (datos.estd_est == 'A')
                $('#inputEstado').attr('checked', true);
            else
                $('#inputEstado').attr('checked', false);


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
        
            var ruta = "../controller/cEstudianteC.php";
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