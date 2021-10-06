<?php 

require_once '../model/cProgramasM.php';
require_once '../entity/cProgramaE.php';

class cProgramasC 
{
    function listar(){
        $oMod = new cProgramasM();
        return $oMod->Listar();
    }

     //funcion que permite leer los Datos del Formulario
     function getDataForm() {
        //crear un objeto a partir de la Entidad para asignarle 
        $oEnt = new cProgramaE();
        //asignar valores
        $oEnt->setIdprograma($_REQUEST["inputID"]);
        $oEnt->setNomb_pro(trim($_REQUEST["inputNombre"]));
        $oEnt->setDesc_pro($_REQUEST["inputDesc"]); 
        if (isset($_REQUEST["inputEstado"]))
            $oEnt->setEstd_pro("A");
        else
            $oEnt->setEstd_pro("I");
        
        return $oEnt;
    }

    function Insert(cProgramaE $oEnt) {
        //crear un objeto a partir del modelo
        $oMod = new cProgramasM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Insertar($oEnt);
        //retornar Mensaje
        return $msg;
    }

    function Update(cProgramaE $oEnt)
    {
        $oMod = new cProgramasM();
        $msg = $oMod->Editar($oEnt );
        return $msg;
    }

    function Delete($idprog) {
        //crear un objeto a partir del modelo
        $oMod = new cProgramasM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Eliminar( $idprog );
        //retornar Mensaje
        return $msg;
    }

    function SelecById($idprog) {
        //crear un objeto a partir del modelo
        $oMod = new cProgramasM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $row = $oMod->SeleccionarxID( $idprog );
        //retornar Mensaje
        return $row;
    }

}
//Realizar Accion (Insert, Update, Delete, Select) segÃºn datos llegados desde el Formulario
if (isset($_REQUEST["inputAccion"])) {
    //Crear un Objeto a partir de esta clase
    $oCont = new cProgramasC();
    //recuperar el valor de InputAccion
    $accion = $_REQUEST["inputAccion"];
    //Determinar que acciÃ³n se va a realizar
    switch ($accion) {

        case "Insert":
            // print_r($_REQUEST);//VERIFICAR
            echo $oCont->Insert($oCont->getDataForm());
            break;
        case "Update":
            //print_r($_POST);
            echo $oCont->Update($oCont->getDataForm());
            break;
        case "Delete":
            echo $oCont->Delete($_REQUEST["inputID"]);
            break;
        case "SelectByID":
            $rpta = $oCont->SelecById($_REQUEST["inputID"]);
            echo json_encode($rpta);
            break;
        
    }
}

