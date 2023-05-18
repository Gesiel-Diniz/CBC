<?php

require_once("../configs/connection.php");

class Clubes { 

    function get() {

        $connect = new Connection();

        try{
            $sql = "SELECT v.*
                    FROM clube as v ";
            $conn = $connect->connection();
            $getRegistro = $conn->prepare($sql);
            $getRegistro->execute();
            $clubes = $getRegistro->fetchAll(PDO::FETCH_ASSOC);
            //closeConnection($conn);
            return $clubes;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    function add($params = null) {

        if($params !== null && count($params) > 1) {

            $connect = new Connection();

            try {
                $conn = $connect->connection();
                $columns = implode(", ", array_keys($params));
                $parameters = ":".implode(", :", array_keys($params));
                $sql = 'INSERT INTO clube ('.$columns.') VALUES ('.$parameters.')';
                return $conn->prepare($sql)->execute($params); 
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }else{
            return false;
        }
}

}