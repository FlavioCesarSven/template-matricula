<?php 

require_once '../config/connMySQL.php';
require_once '../entity/cOperadorE.php';

class cOperadorM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from tb_operador";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

    function Insertar( cOperadorE $oEnt ){
        try
        {
            
            error_reporting(E_ALL & ~E_NOTICE);
            
            $oConn = new connMysql(); 
            $mysqli = $oConn->getConnection(); 
            $strSQL = "insert into tb_operador values(?,?,?)"; 
            $stmt = $mysqli->prepare($strSQL);
            $stmt->bind_param('iss', 
                    $oEnt->getIdoperador(),
                    $oEnt->getNomb_ope(),
                    $oEnt->getEstd_ope(),
                );
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

    function Eliminar($idprog)
    {
        try // manejo de errores 
        {
            error_reporting(E_ALL & ~E_NOTICE);
            $oConn = new connMysql();
            //Creamos una variable para leer la ConexiÃ³n
            $mysqli = $oConn->getConnection();
            //sentencia SQL para insertar
            $strSQL = "delete from tb_operador where idoperador=?";
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

    function SeleccionarxID($idprog)
    {
        $oConn = new connMySQL();
        $sql  = "select * from tb_operador where idoperador = '$idprog'";

        $result = $oConn->executeQuery($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    function Editar(cOperadorE $oEnt)
    {
        try {
            error_reporting(E_ALL & ~E_NOTICE);
            $oConn = new connMysql();
            $mysqli = $oConn->getConnection();
            $sql = "update tb_operador set nomb_ope=?, estd_ope=? where idoperador=?";
            $stmt = $mysqli->prepare($sql);

            $stmt->bind_param(
                'ssi',
                $oEnt->getNomb_ope(),
                $oEnt->getEstd_ope(),
                $oEnt->getIdoperador()  
            );

            $stmt->execute();
            
            $mysqli->close();
            return "OK";
        } catch (Exception $exc) {
            return 'Error '.$exc->getMessage();
        }
    }
}