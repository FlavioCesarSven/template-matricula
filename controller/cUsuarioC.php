<?php

session_start();

require_once '../model/cUsuarioM.php';

class cUsuarioC
{
    function validateAccessUser( $logi, $pass )
    {
        $oMod = new cUsuarioM(  );
        return $oMod->validarAcceso($logi, $pass);
    }


}

if (isset($_REQUEST["inputAccion"])) {
    $oCont = new cUsuarioC();
    $accion = $_REQUEST["inputAccion"];
    switch ($accion) {

        case "ValidarInicioSesion":

            if ( isset($_REQUEST["InputLogin"]) && isset($_REQUEST["InputPassword"]) ) {

                $login = $_REQUEST["InputLogin"];
                $password = $_REQUEST["InputPassword"];

                $result = $oCont -> validateAccessUser($login, $password);
                $row = $result->fetch_object();

                if (isset($row)) {
                    $_SESSION["usuario"]=$row->usuario; 
                    $_SESSION["nomb_are"]=$row->nomb_are; 
                    $_SESSION["foto_usu"]=$row->foto_usu; 
                }

                //codificar en formato json
                echo json_encode($row);
               
            }
            break;

            case "CerrarSesion":

                session_unset();
                session_destroy();
    
                header("Location:../admin/login.php");
    
    
                break;
        
    }
}


