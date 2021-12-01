<?php 

require_once '../config/connMySQL.php';
require_once '../entity/cMatriculaE.php';
require_once '../entity/cEstudianteE.php';


class cMatriculaM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from  v_matricula order by 1";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

    function SeleccionarxDNI($dni)
    {
        $oConn = new connMySQL();
        $sql  = "select * from v_estudiante_matricula where ndni_est = '$dni'";

        $result = $oConn->executeQuery($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    function ActualizarEstudiante(cEstudianteE $oEnt)
    {
        try 
        {
            //omitir mensajes de error
            error_reporting(E_ALL & ~E_NOTICE);
            //Crear un objeto a partir de la
            //clase de conexion
            $oConn=new connMySQL();
            //creamos una variable para leer la conexion
            $mysqli=$oConn->getConnection();
            //Sentencia Sql para realizar la Inserción
            $sql="update tb_estudiante set dire_est=?,cins_est=?,ncel_est=?,idoperador=?,idubigeo=?, fnac_est=? where idestudiante=?";
            //Preparar la sentencia
            $stmt=$mysqli->prepare($sql);
            //Establecemos los valores para los parametros
            $stmt->bind_param('sssissi', $oEnt->getDire_est(),
                                      $oEnt->getCins_est(),
                                      $oEnt->getNcel_est(),
                                      $oEnt->getIdoperador(),
                                      $oEnt->getIdubigeo(),
                                      $oEnt->getFnac_est(),
                                      $oEnt->getIdestudiante());
            //Ejecutar sentencia
            $stmt->execute();
            //Cerramos la conexion
            $mysqli->close();
            //retornar el mensaje
            return 'OK';
        } 
        catch (Exception $exc)
        {
            return 'Error: '.$exc->getMessage();
        }
    }
    
    function ActualizarMatricula(cMatriculaE $oEnt)
    {
        try 
        {
            //omitir mensajes de error
            error_reporting(E_ALL & ~E_NOTICE);
            //Crear un objeto a partir de la
            //clase de conexion
            $oConn=new connMySQL();
            //creamos una variable para leer la conexion
            $mysqli=$oConn->getConnection();
            //Sentencia Sql para realizar la Inserción
            $sql="update tb_matricula set frat_mat=?,fotv_mat=?,estd_mat=? where idmatricula=?";
            //Preparar la sentencia
            $stmt=$mysqli->prepare($sql);
            //Establecemos los valores para los parametros
            $stmt->bind_param('sssi', $oEnt->getFrat_mat(),
                                      $oEnt->getFotv_mat(),
                                      $oEnt->getEstd_mat(),
                                      $oEnt->getIdmatricula());
            //Ejecutar sentencia
            $stmt->execute();
            //Cerramos la conexion
            $mysqli->close();
            //retornar el mensaje
            return 'OK';
        } 
        catch (Exception $exc)
        {
            return 'Error: '.$exc->getMessage();
        }
    } 

    function Eliminar($idprog)
    {
        try // manejo de errores 
        {
            error_reporting(E_ALL & ~E_NOTICE);
            $oConn = new connMysql();
            //Creamos una variable para leer la ConexiÃ³n
            $mysqli = $oConn->getConnection();
            //sentencia SQL para insertar
            $strSQL = "delete from tb_matricula where idmatricula=?";
            //Preparar la Sentencia para su ejecuciÃ³n
            $stmt = $mysqli->prepare($strSQL);
            //Establecer o asignar los valores para los parametros a partir de la Entidad
            $stmt->bind_param('i', $idprog);
            //ejecuta la sentencia
            $stmt->execute();
            //********************************************
            //cerrar conexiÃ³n
            $mysqli->close();
            //retornar
            return "OK";
        } catch (Exception $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    }



}