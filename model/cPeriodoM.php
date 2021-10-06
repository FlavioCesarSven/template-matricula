<?php 

require_once '../config/connMySQL.php';
require_once '../entity/cPeriodo.php';

class cPeriodoM {

    function Listar(){
        $oConn = new connMySQL();
        $sql  = "select * from tb_periodo";

        $result = $oConn->executeQuery($sql);
        return $result;
    }

    function Insertar( cPeriodoE $oEnt ){
        try
        {
            error_reporting(E_ALL & ~E_NOTICE);
            
            $oConn = new connMysql(); 
            $mysqli = $oConn->getConnection(); 
            $strSQL = "insert into tb_periodo values(?,?,?,?,?)"; 
            $stmt = $mysqli->prepare($strSQL);
            $stmt->bind_param('issss', 
                    $oEnt->getIdperiodo(),
                    $oEnt->getNomb_per(),
                    $oEnt->getInicio_per(),
                    $oEnt->getFfin_per(),
                    $oEnt->getEstd_per(),
                );

            $stmt->execute();
         
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
        
            $mysqli = $oConn->getConnection();
           
            $strSQL = "delete from tb_periodo where idperiodo=?";
    
            $stmt = $mysqli->prepare($strSQL);
          
            $stmt->bind_param('i', $idprog);
        
            $stmt->execute();
     
            $mysqli->close();
        
            return "OK";
        } catch (Exception $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    }

    function SeleccionarxID($idprog)
    {
        $oConn = new connMySQL();
        $sql  = "select * from tb_periodo where idperiodo = '$idprog'";

        $result = $oConn->executeQuery($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    function Editar(cPeriodoE $oEnt)
    {
        try {
            error_reporting(E_ALL & ~E_NOTICE);
            $oConn = new connMysql();
            $mysqli = $oConn->getConnection();
            $sql = "UPDATE tb_periodo SET nomb_per=?, fini_per=?, ffin_per=?, estd_per=? WHERE idperiodo=?";
            $stmt = $mysqli->prepare($sql);

            $stmt->bind_param(
                'ssssi',
                $oEnt->getNomb_per(),
                $oEnt->getInicio_per(),
                $oEnt->getFfin_per(),
                $oEnt->getEstd_per(),
                $oEnt->getIdperiodo()
            );

            $stmt->execute();
            
            $mysqli->close();
            return "OK";
        } catch (Exception $exc) {
            return 'Error '.$exc->getMessage();
        }
    }
}