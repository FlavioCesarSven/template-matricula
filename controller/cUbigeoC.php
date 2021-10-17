<?php 

require_once '../model/cUbigeoM.php';

class cUbigeoC 
{
    function listar(){
        $oMod = new cUbigeoM();
        return $oMod->Listar();
    }
}

