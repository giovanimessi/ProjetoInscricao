<?php
require 'pages/header.php';
require 'config.php';   
require 'classes/usuarios.class.php';
$u = new Usuarios();

if(isset($_GET['cod_inscricao']) && !empty($_GET['cod_inscricao'])){
    $cod_inscricao = addslashes($_GET['cod_inscricao']);

    $u->Excluir($cod_inscricao);

    header("Location: dados.php");

}

?>


<?php
require "pages/footer.php";

?>
