<?php 

require_once '../config/connMySQL.php';

class cProgramasM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from tb_programa";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}