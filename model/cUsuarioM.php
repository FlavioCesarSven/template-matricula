<?php 

session_start();

require_once '../config/connMySQL.php';

class cUsuarioM {

    function validarAcceso( $logi, $pass ){

        $oConn = new connMySQL();
        $sql  = "select * from v_usuario WHERE logi_usu='$logi' AND pass_usu='$pass' ORDER BY 1";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}