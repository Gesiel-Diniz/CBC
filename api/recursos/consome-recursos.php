<?php

include_once("../../models/clubes.php");
include_once("../../models/recursos.php");

if($_SERVER['REQUEST_METHOD'] == "PUT") {

    $dbClubes = new Clubes();
    $dbRecursos = new Recursos();

    $arr = json_decode(file_get_contents('php://input'), true);

    
    $arrClube = $dbClubes->getParam($arr['clube_id']);
    $arr['novo_saldo_clube'] = ((float)$arrClube['saldo_disponivel'] - (float)$arr['valor_consumo']);
    if($arr['novo_saldo_clube'] < 0) {

        http_response_code(200);
        echo json_encode(array('status' => 400, 'message' => 'O saldo disponivel do clube e insuficiente.'));
        exit;

    }
    
    $arrRecurso = $dbRecursos->getParam($arr['recurso_id']);
    $arr['novo_saldo_recurso'] = ((float)$arrRecurso['saldo_disponivel'] - (float)$arr['valor_consumo']);
    if($arr['novo_saldo_recurso'] < 0) {

        http_response_code(200);
        echo json_encode(array('status' => 400, 'message' => 'O saldo disponivel para o recurso solicitado e insuficiente.'));
        exit;

    }

    if($dbClubes->updateSaldo($arr)) {

        if($dbRecursos->updateSaldo($arr)) {
            http_response_code(200);
            echo json_encode(array(
                'clube' => $arrClube['clube'], 
                'saldo_anterior' => (float)$arrClube['saldo_disponivel'],
                'saldo_atual' => $arr['novo_saldo_clube']
            ));

        }else{

            http_response_code(500);
            echo json_encode(array('status' => 500, 'message' => 'Erro interno inesperado'));

        }
    }else{

        http_response_code(500);
        echo json_encode(array('status' => 500, 'message' => 'Erro interno inesperado'));

    }

}