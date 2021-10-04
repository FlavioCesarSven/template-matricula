<?php 

require_once '../config/connMySQL.php';

class cMatriculaM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from v_matricula order by 1";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}