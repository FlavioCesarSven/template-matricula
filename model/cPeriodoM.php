<?php 

require_once '../config/connMySQL.php';

class cPeriodoM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from tb_periodo";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}