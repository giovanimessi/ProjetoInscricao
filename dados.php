<?php
require 'pages/header.php';
require 'config.php';


   
require 'classes/usuarios.class.php';
$u = new Usuarios();


?>

<div class="form-horizontal">
<fieldset>
<div class="panel panel-primary">
    <div class="panel-heading">Dados da Inscrição</div>
      <div class="container" id="info">
     
      <table class="table table-dark">
  <thead>
  <a href="cadastro.php" class="btn btn-primary mb-4">Cadastrar</a>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOME COMPLETO </th>
      <th scope="col">CPF </th>
      <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $total = $u->getTotalInscritos();
  
  
$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
	$p = addslashes($_GET['p']);
}
    $pagina = 12;
    $total_paginas = ceil($total / $pagina);

   $lista = $u->getALL($p, $pagina);
  
  

   foreach($lista as $item):?>

    <tr>
      <td><?php echo $item['cod_inscricao'];?></td>
      <td><?php echo $item['nome'];?></td>
      <td><?php echo $item['cpf'];?></td>
        <td>
            <a class="btn btn-warning" href="editar.php?cod_inscricao=<?php echo $item['cod_inscricao']; ?>">Editar</a> -
             <a target="_blank" class="btn btn-default"  href="comprovante/registro.php?id=<?php echo $item['cod_inscricao']; ?>"><img src="assets/imagem/impressora.png" style="width: 20px;"></a>


        </td>
        <td></td>

    </tr>



<?php

    endforeach;



    ?>
  </tbody>
</table>
<ul class="pagination">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="dados.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>
			</ul>

      </div>
     
</fieldset>
</div>
<?php
require "pages/footer.php";

?>