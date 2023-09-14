<?php
class Usuario extends Conexion
{

    public function getUsers()
    {
        try {
            //Conexion
            $con = parent::conectar();
            //Nombres en español
            parent::setNames();
            //Consulta sql
            $query = "SELECT * FROM users WHERE estado = '1'";
            //Preparamos la consulta
            $query = $con->prepare($query);
            //Ejecutamos la consulta
            $query->execute();
            //Sacamos un arrar asociativo de la consulta
            //Se envia por parametro el PDO::FETCH_ASSOC para que solo me traiga los valores que tiene su calve alfanumerica
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return 'Ops error al consultar' . $e->getMessage();
        }
    }
    public function getUser($documento)
    {
        try {
            //Conexion
            $con = parent::conectar();
            //Nombres en español
            parent::setNames();
            //Consulta sql
            $query = "SELECT * FROM users WHERE estado = '1' AND documento = '$documento'";
            //Preparamos la consulta
            $query = $con->prepare($query);
            //Establecemos el valor del parametro
            //$query->bindValue(1, $documento);
            //Ejecutamos la consulta
            $query->execute();
            //Sacamos un arrar asociativo de la consulta
            //Se envia por parametro el PDO::FETCH_ASSOC para que solo me traiga los valores que tiene su calve alfanumerica
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return 'Ops error al consultar' . $e->getMessage();
        }


        return $result;
    }
   
    
}
