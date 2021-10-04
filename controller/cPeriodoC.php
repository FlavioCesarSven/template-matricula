<?php 

require_once '../model/cPeriodoM.php';

class cPeriodoC 
{
    function listar(){
        $oMod = new cPeriodoM();
        return $oMod->Listar();
    }
}
