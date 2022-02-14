<?php

session_start();
global $pdo;

try{

$pdo = new PDO("pgsql:host=localhost;dbname=sysinfo","postgres","java10");

}catch(PDOException $ex){

    echo "Falha na conexao ".$ex->getMessage();
}
    
?>