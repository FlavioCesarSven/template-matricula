<?php

require_once '../config/connMySQL.php';

class cUbigeoM
{
    function Listar()
    {
        $oConn = new connMySQL();
        $sql  = "select * from v_ubigeo order by 1";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

}
