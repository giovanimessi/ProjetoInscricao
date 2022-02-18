<?php

require 'config.php';
require 'pages/header.php';
require 'classes/usuarios.class.php';
$u = new Usuarios();


if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $senha = md5($_POST['senha']);

    $u->FazerLogin($cpf, $senha);
}

?>

<div class=" container">
    <div class="row">
<div class="screen">
        <div class="leftside">

        <div class="rightside">
          <h1 id="texto" style="text-align:center; font-family: initial;">ADM</h1>

          <form method="POST" action="" class="validator">
            <label>
              CPF:<br/>
              <input type="text" name="cpf" data-rules="max=14" VALUE="396.814.900-96" required="" maxlength="14" autocomplete="off" Onkeypress="$(this).mask('000.000.000-00');">
             </label>
    
	         <label>
              Senha:<br/>
              <input type="password" name="senha" class="form-control" required="">
             </label>
              <input type="submit" class="btn btn-primary" value="Acessar" />
    
          </form>

        </div>
      </div>
      </div>

</div>


<?php
require "pages/footer.php";

?>