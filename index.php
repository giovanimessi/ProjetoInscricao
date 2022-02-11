<?php
require 'config.php';
require 'pages/header.php';


?>

<div class=" container">
    <div class="row">
<div class="screen">
        <div class="leftside">

        <div class="rightside">
          <h1>Inscricao</h1>

          <form method="POST" action="cadastro.php" class="validator">
            <label>
              CPF:<br/>
              <input type="text" name="cpf" data-rules="max=14" />
             </label>
    
               <img src="captcha.php" width="100" height="50" />
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