<?php

require 'config.php';
require 'pages/header.php';


if(!isset($_SESSION['captcha'])) {
	$n = rand(10000, 99999);
	$_SESSION['captcha'] = $n;
}

if(!empty($_POST['codigo'])) {
	
	$codigo = addslashes($_POST['codigo']);
  $cpf = addslashes($_POST['cpf']);

	if($codigo == $_SESSION['captcha']) {
    header("Location: dados.php");
	
	} else {
		echo 'digite o código novamente...';
	}


	$n = rand(10000, 99999);
	$_SESSION['captcha'] = $n;
}
?>

<div class=" container">
    <div class="row">
<div class="screen">
        <div class="leftside">

        <div class="rightside">
          <h1>Inscricao</h1>

          <form method="POST" action="" class="validator">
            <label>
              CPF:<br/>
              <input type="text" name="cpf" data-rules="max=14" required="" maxlength="14"  Onkeypress="$(this).mask('000.000.000-00');">
             </label>
    
               <img src="captcha.php" width="150" height="50" />
	                                                          <br/>
	           <input type="text" name="codigo" /><br/><br/>
              <input type="submit" class="btn btn-primary" value="Acessar" />
    
          </form>

        </div>
      </div>
      </div>

</div>


<?php
require "pages/footer.php";

?>