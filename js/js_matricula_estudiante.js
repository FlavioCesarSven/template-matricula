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
            $('#InputOculto').val(nameFile);

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

function ActualizarDatos() {
    // alert( 'hello' );

    //Validacion
    var InputDNI = $('#InputDNI').val();
    //2. Pregunta si esta vacio
    if (InputDNI.length != 8)
    {
        $('#msgDni').html('<div class="alert alert-danger" role="alert">Ingrese 8 Dígitos</div>').show(300).delay(2300).hide(300);
        $('#InputDNI').focus();
        return false;
    }

    var InputApel = $('#InputApellidos').val();
    //2. Pregunta si esta vacio
    if (InputApel.length == 0)
    {
        $('#msgApel').html('<div class="alert alert-danger" role="alert">Seleccione a un estudiante correcto</div>').show(300).delay(2300).hide(300);
        $('#InputApellidos').focus();
        return false;
    }

    var InputOperador = $('#inputOperador').val();
    //Pregunta si esta vacio
    if (InputOperador == null)
    {
        $('#msgOpe').html('<div class="alert alert-danger" role="alert">Seleccione Operador</div>').show(300).delay(2300).hide(300);
        $('#InputOperador').focus();
        return false;
    }

    var InputCelular = $('#InputCelular').val();
//    //2. Pregunta si esta vacio
    if (InputCelular.length != 9)
    {
        $('#msgCel').html('<div class="alert alert-danger" role="alert">Ingrese 9 Dígitos</div>').show(300).delay(2300).hide(300);
        $('#InputCelular').focus();
        return false;
    }

    var InputMail = $('#InputMail').val();
    if ($("#InputMail").val().indexOf('@', 0) == -1 || $("#InputMail").val().indexOf('.', 0) == -1)
    {
        $('#msgMail').html('<div class="alert alert-danger" role="alert">Ingrese un Correo Electronico Valido</div>').show(300).delay(2300).hide(300);
        $('#InputMail').focus();
        return false;
    }

    var InputDireccion = $('#InputDireccion').val();
//    //2. Pregunta si esta vacio
    if (InputDireccion.length == 0)
    {
        $('#msgDire').html('<div class="alert alert-danger" role="alert">Ingrese Dirección</div>').show(300).delay(2300).hide(300);
        $('#InputDireccion').focus();
        return false;
    }

    var InputUbigeo = $('#inputUbigeo').val();
    //Pregunta si esta vacio
    if (InputUbigeo == null)
    {
        $('#msgUbig').html('<div class="alert alert-danger" role="alert">Seleccione Ubigeo</div>').show(300).delay(2300).hide(300);
        $('#inputUbigeo').focus();
        return false;
    }
    //Ver si se seleccionó una imagen
    var InputOculto = $('#InputOculto').val();
    if (InputOculto == '../images/voucher/no-disponible.jpg')
    {
        $('#msgVoucher').html('<div class="alert alert-danger" role="alert">Subir imagen de Voucher</div>').show(300).delay(2300).hide(300);
        $('#openFile').focus();
        return false;
    }

    return false;
}


function buscarEstudiante()
{
    var dnibuscado = $('#InputDNI').val();
    if (dnibuscado.length != 8)//CUENTA CARACTERES
    {
        $('#msgDni').html('<div class="alert alert-danger" role="alert">Ingrese DNI</div>').show(350).delay(2500).hide(350);
        $('#InputDNI').focus();
        return false;
    }
    else
    {
        //ENVIAR LOS DATOS
        //1. INDICAR LA RUTA
        var ruta = '../controller/cMatriculaC.php';
        //2. Indicar la Accion
        var accion = "SelectByDni";
        //3. Emplear AJAX
        $.ajax(
                {
                    type: 'POST',
                    url: ruta,
                    data: 'InputAccion=' + accion + '&InputDNI=' + dnibuscado,
                    success: function (data)
                    {
                        //alert(data);
                        if (data!="null")
                        {
                            var datos = JSON.parse(data);
                            //pasar los datos al formulario
                            $('#InputID').val(datos.idestudiante);
                            $('#InputIDMat').val(datos.idmatricula);
                            $('#InputDNI').val(datos.ndni_est);
                            $('#InputApellidos').val(datos.Estudiante);
                            $('#InputPrograma').val(datos.nomb_pro);
                            $('#InputTurno').val(datos.nomb_cic + ' - ' + datos.turn_mat);
                            $('#inputOperador').val(datos.idoperador);
                            $('#InputCelular').val(datos.ncel_est);
                            $('#inputFecNac').val(datos.fnac_est);
                            $('#InputMail').val(datos.cins_est);
                            $('#foto_est').attr('src', '../' + datos.foto_est);
                            $('#mi_imagen').attr('src', '../' + datos.fotv_mat);
                            $('#InputOculto').val('../'+datos.fotv_mat);
                            $('#InputDireccion').val(datos.dire_est);
                            // $('#inputFecNac').val('../'+datos.fnac_est);
                            $('#inputUbigeo').val(datos.idubigeo);
                            $('#inputUbigeo').selectpicker('refresh');
                            
                            if (datos.estd_mat == 'N')
                                $("#btnLimpiar").show();
                            else
                            {
                                var Mensaje = '';
                                if (datos.estd_mat=='S')
                                    Mensaje = 'DNI: ' + datos.ndni_est + ' | MATRICULA REALIZADA';
                                else
                                    Mensaje = 'DNI: ' + datos.ndni_est + ' | Registrado en el Sistema!!! por Verificación';

                                var msg = '';

                                    Swal.fire({
                                        title: 'VRHT - Estado Matricula 2021',
                                        text: Mensaje,
                                        icon: 'success',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Aceptar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            //**********************************************************************
                                            window.location.reload();
                                            limpiarForm();
                                            //********************************************
                                        }
                                        else
                                        {
                                            window.location.reload();
                                            limpiarForm();
                                        }
                                    }
                                )
                            }
                        } 
                        else 
                        {
                            Swal.fire({
                                icon: 'warning',
                                title: 'MATRICULA 2021',
                                text: 'Estudiante No Existe... comuniquese al 963894359, para verificar su condición',
                                //allowEnterKey: false,
                                allowEscapeKey: false,
                                allowOutsideClick: false
                            });
                            // alert('');
                            $('#InputDNI').focus();
                        }
                    }
                }
        );
        return false;
    }
}
