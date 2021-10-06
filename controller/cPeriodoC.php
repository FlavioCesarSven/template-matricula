<?php 

require_once '../model/cPeriodoM.php';
require_once '../entity/cPeriodo.php';

class cPeriodoC 
{
    function listar(){
        $oMod = new cPeriodoM();
        return $oMod->Listar();
    }

        //funcion que permite leer los Datos del Formulario
        function getDataForm()
        {
            //crear un objeto a partir de la Entidad para asignarle 
            $oEnt = new cPeriodoE();
            //asignar valores
            $oEnt->setIdperiodo($_REQUEST["inputID"]);
            $oEnt->setNomb_per(trim($_REQUEST["inputNombre"]));
            $oEnt->setInicio_per(trim($_REQUEST["inputFinicio"]));
            $oEnt->setFfin_per(trim($_REQUEST["inputFinal"]));
            if (isset($_REQUEST["inputEstado"]))
                $oEnt->setEstd_per("I");
            else
                $oEnt->setEstd_per("A");
        
            return $oEnt;
        }

    function Insert(cPeriodoE $oEnt) {
        //crear un objeto a partir del modelo
        $oMod = new cPeriodoM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Insertar($oEnt);
        //retornar Mensaje
        return $msg;
    }

    function Update(cPeriodoE $oEnt)
    {
        $oMod = new cPeriodoM();
        $msg = $oMod->Editar($oEnt );
        return $msg;
    }

    function Delete($idprog) {
        //crear un objeto a partir del modelo
        $oMod = new cPeriodoM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Eliminar( $idprog );
        //retornar Mensaje
        return $msg;
    }

    function SelecById($idprog) {
        //crear un objeto a partir del modelo
        $oMod = new cPeriodoM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $row = $oMod->SeleccionarxID( $idprog );
        //retornar Mensaje
        return $row;
    }
}

//Realizar Accion (Insert, Update, Delete, Select) segÃºn datos llegados desde el Formulario
if (isset($_REQUEST["inputAccion"])) {
    //Crear un Objeto a partir de esta clase
    $oCont = new cPeriodoC();
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
