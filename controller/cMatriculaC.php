<?php 

require_once '../model/cMatriculaM.php';
require_once '../entity/cMatriculaE.php';
require_once '../entity/cEstudianteE.php';

class cMatriculaC
{
    function listar(){
        $oMod = new cMatriculaM();
        return $oMod->Listar();
    }

    
    function SelecByDni($dni) {
        //crear un objeto a partir del modelo
        $oMod = new cMatriculaM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $row = $oMod->SeleccionarxDNI( $dni );
        //retornar Mensaje
        return $row;
    }

//
function getFormularioEstudiante() {
    //creamos un objeto a partir de la Entidad
    $oEnt = new cEstudianteE();
    //Asignamos valores al Objeto de la Entidad
    //A partir de los datos del formulario
    $oEnt->setIdestudiante($_POST["InputID"]);
    $oEnt->setDire_est($_POST["InputDireccion"]);
    $oEnt->setCins_est($_POST["InputMail"]);
    $oEnt->setNcel_est($_POST["InputCelular"]);
    $oEnt->setIdoperador($_POST["inputOperador"]);
    $oEnt->setIdubigeo($_POST["inputUbigeo"]);
    $oEnt->setFnac_est($_POST["inputFecNac"]);
    //retornar el Objeto
    return $oEnt;
}

function getFormularioMatricula() {
    //creamos un objeto a partir de la Entidad
    $oEnt = new cMatriculaE();
    //capturar fecha
    date_default_timezone_set('America/Lima');
    $date = date("d-m-Y");
    //obtener el numero de Dni del Estudiante
    $dni = $_POST["InputDNI"];
    //Asignamos valores al Objeto de la Entidad
    //A partir de los datos del formulario
    $oEnt->setIdmatricula($_POST["InputIDMat"]); //idmatricula
    $oEnt->setEstd_mat('R'); //establecer la R para el estado
    //Subida del Voucher, estableciendo el nombre de archivo
    if (file_exists($_FILES['InputFile']['tmp_name']) || is_uploaded_file($_FILES['InputFile']['tmp_name'])) {
        //obtener el nombre del archivo
        $name_pic = trim($_FILES['InputFile']['name']);
        //obtener la extension
        $extension = pathinfo($name_pic, PATHINFO_EXTENSION);
        //formar el nombre del archivo
        $name_pic = $dni . "_" . $date . '.' . $extension;
        //subir el archivo al servidor
        move_uploaded_file($_FILES['InputFile']['tmp_name'], '../images/voucher/' . $name_pic);
        //asignamos a la Entidad para Guardar
        $oEnt->setFotv_mat('images/voucher/' . $name_pic);
    }
    //Captura Fecha Sistema segun Zona Horaria
    $oEnt->setFrat_mat(date('Y-m-d H:i:s'));
    //retornar el Objeto
    return $oEnt;
}

function UpdateEstudiante(cEstudianteE $oEnt)
{
    //crear objeto a partir del modelo
    $oMod=new cMatriculaM();
    //Envio de Datos y devolucion de mensaje
    return $oMod->ActualizarEstudiante($oEnt);
}

function UpdateMatricula(cMatriculaE $oEnt)
{
    //crear objeto a partir del modelo
    $oMod=new cMatriculaM();
    //Envio de Datos y devolucion de mensaje
    return $oMod->ActualizarMatricula($oEnt);
}

function Delete($idprog) {
    //crear un objeto a partir del modelo
    $oMod = new cMatriculaM();
    //Trasladar los datos al Modelo y se recepciona Mensaje
    $msg = $oMod->Eliminar( $idprog );
    //retornar Mensaje
    return $msg;
}

}


//Realizar Accion (Insert, Update, Delete, Select) segÃºn datos llegados desde el Formulario
if (isset($_REQUEST["InputAccion"])) {
    //Crear un Objeto a partir de esta clase
    $oCont = new cMatriculaC();
    //recuperar el valor de InputAccion
    $accion = $_REQUEST["InputAccion"];
    //Determinar que acciÃ³n se va a realizar
    switch ($accion) {


        case "UpdateMat":
            // print_r($_REQUEST);
            $oCont->UpdateEstudiante($oCont->getFormularioEstudiante());
            echo $oCont->UpdateMatricula($oCont->getFormularioMatricula());
            break;

        case "Delete":
            echo $oCont->Delete($_REQUEST["inputID"]);
            break;
                
        case "SelectByDni":
            $rpta = $oCont->SelecByDni($_REQUEST["InputDNI"]);
            echo json_encode($rpta);
            break;
        
    }
}