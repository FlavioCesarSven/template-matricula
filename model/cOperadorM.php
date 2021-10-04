<?php 

require_once '../config/connMySQL.php';

class cOperadorM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from tb_operador";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}