<?php 

require_once '../model/cProgramasM.php';

class cProgramasC 
{
    function listar(){
        $oMod = new cProgramasM();
        return $oMod->Listar();
    }
}
