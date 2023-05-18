<?php

include_once("../models/clubes.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $dbClubes = new Clubes();
    echo json_encode($dbClubes->get());

}elseif($_SERVER['REQUEST_METHOD'] == "POST") {

    $dbClubes = new Clubes();
    if($dbClubes->add(json_decode(file_get_contents('php://input'), true))) {
        http_response_code(200);
        echo json_encode(array('status' => 200, 'message' => 'ok'));
    }else{
        http_response_code(400);
        echo json_encode(array('status' => 400, 'message' => 'Erro no formato dos dados'));
    }

}