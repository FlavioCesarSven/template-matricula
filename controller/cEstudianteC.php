<?php 

require_once '../model/cEstudianteM.php';

class cEstudianteC 
{
    function listar(){
        $oMod = new cEstudianteM();
        return $oMod->Listar();
    }

    function getDataForm()
    {
        //creamos un objeto a partir de la Entidad
        $oEnt=new cEstudianteE();
   
        $oEnt->setIdestudiante($_POST["inputID"]);
        $oEnt->setNdni_est($_POST["inputDni"]);
        $oEnt->setApel_est($_POST["inputApellidos"]);
        $oEnt->setNomb_est($_POST["inputNombres"]);
        $oEnt->setFnac_est($_POST["inputFecNac"]);
        $oEnt->setSexo_est($_POST["inputSexo"]);
        $oEnt->setDire_est($_POST["inputDireccion"]);
        $oEnt->setCins_est($_POST["inputEmail"]);
        $oEnt->setNcel_est($_POST["inputMovil"]);
        $oEnt->setIdoperador($_POST["inputOperador"]);
        $oEnt->setIdprograma($_POST["inputPrograma"]);
        $oEnt->setIdubigeo($_POST["inputUbigeo"]);


        //Imagen
        $oEnt->setFoto_est("images/estudiantes/sin-foto.jpg");
        //Captura Fecha Sistema segun Zona Horaria
        date_default_timezone_set('America/Lima');
        $oEnt->setFreg_est(date('Y-m-d H:i:s'));
        //Estado: checkbox
        if (isset($_POST["InputEstado"]))
            $oEnt->setEstd_est('A');
        else
            $oEnt->setEstd_est('I');
        //retornar el Objeto
        return $oEnt;        
    }

    function Insert(cEstudianteE $oEnt) {
        //crear un objeto a partir del modelo
        $oMod = new cEstudianteM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Insertar($oEnt);
        //retornar Mensaje
        return $msg;
    }
}


//Realizar Accion (Insert, Update, Delete, Select) segÃºn datos llegados desde el Formulario
if (isset($_REQUEST["inputAccion"])) {
    //Crear un Objeto a partir de esta clase
    $oCont = new cEstudianteC();
    //recuperar el valor de InputAccion
    $accion = $_REQUEST["inputAccion"];
    //Determinar que acciÃ³n se va a realizar
    switch ($accion) {

        case "Insert":
            echo $oCont->Insert($oCont->getDataForm());
            break;
        case "Update":
            //print_r($_POST);
            // echo $oCont->Update($oCont->getDataForm());
            break;
        case "Delete":
            // echo $oCont->Delete($_REQUEST["inputID"]);
            break;
        case "SelectByID":
            // $rpta = $oCont->SelecById($_REQUEST["inputID"]);
            // echo json_encode($rpta);
            break;
        
    }
}
