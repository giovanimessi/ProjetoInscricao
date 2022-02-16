<?php
require '../config.php';
require '../classes/usuarios.class.php';
$u = new Usuarios();


if(!empty($_GET['id'])){
    $cod_inscricao = addslashes($_GET['id']);

  $info = $u->getInfo($cod_inscricao);

}


// ob_start();


$html = '
<form>
<h1 style="text-align:center">Comprovante de Inscricão</h1>
<p>
    <b>Data do contrato: </b> '.$info["dtcad"].'
</p>
    <b>Nome Completo: </b> '.$info["nome"].'
</p>
<p>
    <b>CPF: </b> '.$info["cpf"].'
</p>
<p>
    <b>Data de Nascimento: </b> '.$info["dtnascimento"].'
</p>
<p>
    <b>Portador de Necessidades: </b> '.$info["opcao"].'
</p>
</form>';



// $html  = ob_get_contents();
// ob_end_clean(); 
require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('arquivo.pdf','D');

//$link = 'http://localhost/www/php/sysinfo/arquivo.pdf';

//echo "Faça o download ".$link;

//$mpdf->output('arquivo.pdf','D');
//I ABRA NO BROWSER
//D FACA O DOWNLOAD
//F SALVAR NO SERVIDOR


?>