<?php

require_once("../../configs/connection.php");

class Clubes { 

    function getParam($id) {

        $connect = new Connection();

        try{
            $sql = "SELECT v.*
                    FROM clube as v 
                    WHERE v.id = ".$id;
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

    function updateSaldo($params = null) {

        if($params !== null && count($params) > 1) {

            $connect = new Connection();

            $arr = array(
                ':id' => $params['clube_id'],
                ':saldo_disponivel' => $params['novo_saldo_clube']
            );

            try {
                $conn = $connect->connection();
                $columns = implode(", ", array_keys($params));
                $parameters = ":".implode(", :", array_keys($params));
                $sql = 'UPDATE clube SET saldo_disponivel = :saldo_disponivel  WHERE id = :id';
                return $conn->prepare($sql)->execute($arr);
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }else{
            return false;
        }
    }

}