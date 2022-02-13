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
   var_dump($lista);



    ?>


  
  </tbody>
</table>
      </div>
</fieldset>
</div>
<?php
require "pages/footer.php";

?>