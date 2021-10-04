<?php 

require_once '../model/cMatriculaM.php';

class cMatriculaC
{
    function listar(){
        $oMod = new cMatriculaM();
        return $oMod->Listar();
    }
}
