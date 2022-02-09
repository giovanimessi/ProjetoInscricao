<?php

try{

$pdo = new PDO("pgsql:host=localhost;dbname=sysinfo","postgres","java10");
echo "Conectado";

}catch(PDOException $ex){

    echo "Falha na conexao ".$ex->getMessage();
}
    
?>