<?php 

require_once '../config/connMySQL.php';

class cEstudianteM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from v_estudiante order by 1";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}