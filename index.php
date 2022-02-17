<?php

require 'config.php';
require 'pages/header.php';
require 'classes/usuarios.class.php';
$u = new Usuarios();


if(!isset($_SESSION['captcha'])) {
	$n = rand(10000, 99999);
	$_SESSION['captcha'] = $n;

}

if(!empty($_POST['codigo'])) {
	
	$codigo = addslashes($_POST['codigo']);
  $cpf = addslashes($_POST['cpf']);

  if ($codigo == $_SESSION['captcha']) {
       //ja existe cadastro
      
       if($u->login($cpf)) {
        
        ?>
        
      }
        <script type="text/javascript">window.location.href="dados.php";</script>
        <?php
      } else {
        ?>
        <div class="alert alert-danger">
        digite o código novamente...
        </div>
        
        <?php
      }

    } else {
    echo 'digite o código novamente...';
    }

 $n = rand(100000, 999999);
 $_SESSION['captcha'] = $n;

}

?>

<div class=" container">
    <div class="row">
<div class="screen">
        <div class="leftside">

        <div class="rightside">
          <h1 id="texto" style="text-align:center; font-family: initial;">Inscricão</h1>

          <form method="POST" action="" class="validator">
            <label>
              CPF:<br/>
              <input type="text" name="cpf" data-rules="max=14" required="" maxlength="14" autocomplete="off" Onkeypress="$(this).mask('000.000.000-00');">
             </label>
    
               <img src="captcha.php" width="150" height="50" />
	                                                          <br/>
	           <input type="text" name="codigo" autocomplete="off"/><br/><br/>
              <input type="submit" class="btn btn-primary" value="Acessar" />
    
          </form>

        </div>
      </div>
      </div>

</div>


<?php
require "pages/footer.php";

?>