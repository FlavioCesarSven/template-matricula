<?php
//El paradigma de Programación a utilizar
//es POO -> Programación Orientada Objetos
class connMySQL {
    //función que permite establecer la conexión
    //hacia el servidor de base de datos y retorna la instancia 
    //de la conexión
    function getConnection()
    {
        //capturar de errores
        try 
        {
           //Lo que queremos ejecutar
           //Instancia de Conexión
           $conn=new mysqli('localhost','root','','appMatricula');
           //retorno
           return $conn;
        } 
        catch (Exception $ex) {
           //En caso de Error
           if ($conn->connect_error) 
               die ('Error: ').$conn->connect_error;
        }
    }
    //funcion que recibe una cadena de consulta
    //la ejecuta y retorna los resultados
    function executeQuery($strSql)
    {
        try 
        {
            //Crear un Objeto a partir de la clase
            $oConn=new connMySQL();
            //recuperar la conexion
            $mysqli=$oConn->getConnection();
            //ejecutar la sentencia y recuperar los 
            //resultados
            $result=$mysqli->query($strSql);
            //cerrar la conexion
            $mysqli->close();
            //retornar el conjunto de resultados
            return $result;
        } 
        catch (Exception $ex) 
        {
            echo 'Error: '.$ex->getMessage();
        }
    }
}
