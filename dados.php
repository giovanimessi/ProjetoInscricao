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
      <div class="container">
     
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
  

    
   $lista = $u->getALL();
  
   foreach($lista as $item):?>

    <tr>
      <td><?php echo $item['cod_inscricao'];?></td>
      <td><?php echo $item['nome'];?></td>
      <td><?php echo $item['cpf'];?></td>
        <td>
            <a class="btn btn-warning" href="editar.php?id=<?php echo $item['cod_inscricao']; ?>">Editar</a> -
             <a class="btn btn-danger" href="excluir.php?id=<?php echo $item['cod_inscricao'];?>">Excluir</a>
             <a target="_blank" class="btn btn-default"  href="comprovante/registro.php?id=<?php echo $item['cod_inscricao']; ?>"><img src="assets/imagem/impressora.png" style="width: 20px;"></a>


        </td>
        <td></td>

    </tr>



<?php

    endforeach;



    ?>
  </tbody>
</table>
      </div>
      <ul class="pagination">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>
			</ul>
</fieldset>
</div>
<?php
require "pages/footer.php";

?>