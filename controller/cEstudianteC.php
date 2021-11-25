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


        
        if (!file_exists($_FILES['InputFile']['tmp_name'])|| !is_uploaded_file($_FILES['InputFile']['tmp_name']))
        {
            //Lineas para conservar la imagen inicial
            //Imagen por defecto del INSERT
           if ($_POST["inputAccion"]=="Insert")
               $oEnt->setFoto_est("images/estudiantes/sin-foto.jpg");
           if ($_POST["inputAccion"]=="Update")
               $oEnt->setFoto_est($_POST["InputOculto"]);
        }
        else //Si se ha cargado imagen: INSERTAR
        {
            //INSERTAR: obtener el nombre del archivo
            $name_pic=trim($_FILES['InputFile']['name']);
            //subir el archivo al servidor
            move_uploaded_file($_FILES['InputFile']['tmp_name'],'../images/estudiantes/'.$name_pic);
            //asignamos a la Entidad para Guardar en la Tabla
            $oEnt->setFoto_est('images/estudiantes/'.$name_pic);          
        }

        //Imagen
        // $oEnt->setFoto_est("images/estudiantes/sin-foto.jpg");
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

    function Update(cEstudianteE $oEnt) {
        //crear un objeto a partir del modelo
        $oMod = new cEstudianteM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Editar($oEnt);
        //retornar Mensaje
        return $msg;
    }

    function Delete($idprog) {
        //crear un objeto a partir del modelo
        $oMod = new cEstudianteM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $msg = $oMod->Eliminar( $idprog );
        //retornar Mensaje
        return $msg;
    }


    function SelecById($idestu) {
        //crear un objeto a partir del modelo
        $oMod = new cEstudianteM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $row = $oMod->SeleccionarxID( $idestu );
        //retornar Mensaje
        return $row;
    }
    function SelecById_Ficha($idestu) {
        //crear un objeto a partir del modelo
        $oMod = new cEstudianteM();
        //Trasladar los datos al Modelo y se recepciona Mensaje
        $row = $oMod->SeleccionarxID_Ficha( $idestu );
        //retornar Mensaje
        return $row;
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
