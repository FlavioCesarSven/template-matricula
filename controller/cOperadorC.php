<?php 

require_once '../model/cOperadorM.php';

class cOperadorC 
{
    function listar(){
        $oMod = new cOperadorM();
        return $oMod->Listar();
    }
}
