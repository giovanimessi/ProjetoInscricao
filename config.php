<?php
global $pdo;
session_start();


try{

$pdo = new PDO("pgsql:host=localhost;dbname=sysinfo","postgres","java10");

}catch(PDOException $ex){

    echo "Falha na conexao ".$ex->getMessage();
}
    
?>