<?php

function connection(){
	$servidor = "127.0.0.1";
	$usuario  = "root";	
	$senha    = "";	
	$baseDados= "cbc";
	try{
		$pdo = new PDO("mysql:host=".$servidor.";dbname=".$baseDados,$usuario,$senha);
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	return $pdo;
}


function closeConnection($conn){
	$conn->query('KILL CONNECTION_ID()');
	$conn = null;
}

?>