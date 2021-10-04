<?php 

require_once '../model/cEstudianteM.php';

class cEstudianteC 
{
    function listar(){
        $oMod = new cEstudianteM();
        return $oMod->Listar();
    }
}
