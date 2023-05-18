<?php

require_once("configs/connection.php");

function getClubes() {

    $sql = "SELECT v.*
	        FROM veiculos as v ";

    $conn = connection();
    $getRegistro = $conn->prepare($sql);
    $getRegistro->execute();
    $veiculos = $getRegistro->fetchAll();
    closeConnection($conn);

}