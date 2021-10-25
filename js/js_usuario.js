function ValidarAcceso()
{
    //Validacion de Ingreso de Datos
    var login = $('#InputLogin').val();
    if (login.length == 0)//CUENTA CARACTERES
    {
        //alert("Ingrese el Nombre");
        $('#msg').html('<div class="alert alert-warning" role="alert">Ingrese Login Usuario</div>').
                show(300).delay(1500).hide(300);
        $('#InputLogin').focus();
        return false;
    }
    var password = $('#InputPassword').val();
    if (password.length == 0)//CUENTA CARACTERES
    {
        //alert("Ingrese el Nombre");
        $('#msg').html('<div class="alert alert-warning" role="alert">Ingrese Password Usuario</div>').
                show(300).delay(1500).hide(300);
        $('#InputPassword').focus();
        return false;
    }
    
    //indicar que acción se va a realizar
    var accion = 'ValidarInicioSesion';
    //Envio de Datos con Ajax
    var ruta = "../controller/cUsuarioC.php";
    $.ajax(
            {
                type: 'POST',
                url: ruta,
                data: 'InputLogin=' + login + '&InputPassword=' + password + '&inputAccion=' + accion,
                success: function (rpta)
                {
                    // alert( rpta, 'Datos Ingresados' );

                    if (rpta!= "null")
                       $(location).attr("href","index.php");//pagina principal admin
                    else
                    {
                        $('#msg').html('<div class="alert alert-warning" role="alert">Datos Incorrectos</div>').
                                show(500).delay(2000).hide(500);
                        $('#InputLogin').focus(); 
                    }
                }
            }
    );
}

