<?php
require 'pages/header.php';
require 'config.php';


   
require 'classes/usuarios.class.php';
$u = new Usuarios();

$id = $_GET['id'];

$item = $u->getUser($id );

?>

<div class="form-horizontal">
<fieldset>
<div class="panel panel-primary">
    <div class="panel-heading" >Dados da Inscrição</div>
      <div class="container mt-5" id="info">
     
      <table class="table table-dark">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">NOME COMPLETO </th>
      <th scope="col">CPF </th>
      <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $item[0]['cod_inscricao'];?></td>
      <td><?php echo $item[0]['nome'];?></td>
      <td><?php echo $item[0]['cpf'];?></td>
        <td>
            <a class="btn btn-warning" href="editar.php?cod_inscricao=<?php echo $item[0]['cod_inscricao']; ?>">Editar</a> 
             <a target="_blank" class="btn btn-default"  href="comprovante/registro.php?id=<?php echo $item[0]['cod_inscricao']; ?>"><img src="assets/imagem/impressora.png" style="width: 20px;"></a>

        </td>
        <td></td>
    </tr>

  </tbody>
</table>


      </div>
     
</fieldset>
</div>
<?php
require "pages/footer.php";

?>