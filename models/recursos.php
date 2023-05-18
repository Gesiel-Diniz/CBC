<?php

require_once("../configs/connection.php");

class Recursos { 

    function get() {

        $connect = new Connection();

        try{
            $sql = "SELECT r.*
                    FROM recurso as r ";
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

    function getParam($id) {

        $connect = new Connection();

        try{
            $sql = "SELECT r.*
                    FROM recurso as r 
                    WHERE r.id = ".$id;
            $conn = $connect->connection();
            $getRegistro = $conn->prepare($sql);
            $getRegistro->execute();
            $values = $getRegistro->fetch(PDO::FETCH_ASSOC);
            //closeConnection($conn);
            return $values;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


    function updateSaldo($params = null) {

        if($params !== null && count($params) > 1) {

            $connect = new Connection();

            $arr = array(
                ':id' => $params['recurso_id'],
                ':saldo_disponivel' => $params['novo_saldo_recurso']
            );

            try {
                $conn = $connect->connection();
                $columns = implode(", ", array_keys($params));
                $parameters = ":".implode(", :", array_keys($params));
                $sql = 'UPDATE recurso SET saldo_disponivel = :saldo_disponivel  WHERE id = :id';
                return $conn->prepare($sql)->execute($arr);
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }else{
            return false;
        }
    }

}