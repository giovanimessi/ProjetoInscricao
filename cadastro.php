<?php
require 'pages/header.php';
require 'config.php';


   
require 'classes/usuarios.class.php';
$u = new Usuarios();



    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $cpf = addslashes($_POST['cpf']);
        $dtnasc = addslashes($_POST['dtnasc']);
        $opcao = addslashes($_POST['opcao']);
        $data = addslashes($_POST['data']);
        $arquivos = $_FILES['arquivos'];
  

        $u->cadastrar($nome,$cpf,$dtnasc,$opcao,$data,$arquivos);


    }

	?>
<form  method="POST"  enctype="multipart/form-data" id="validator" class="form-horizontal">

        <div class="panel panel-primary">
            <div class="panel-heading">Inscrição</div>
        

            <div class="panel-body">
        <div class="form-group">
            <div class="col-md-11 control-label">
                    <a href="sair.php" class="btn btn-primary">Sair</a>
                    <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
            </div>
        </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="data">Data do Cadastro<h11>*</h11></label>  
                        <div class="col-md-2">
                            <input id="dtn" name="data" class="date" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                        </div>
            </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">Nome Completo  <h11>*</h11></label>
            <div class="col-md-8">
            <input type="text" name="nome" class="form-control input-md" data-rules="min=2" required />
            </div>
        </div>

            <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>
            <div class="col-md-2">
            <input type="text" id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" maxlength="14"  Onkeypress="$(this).mask('000.000.000-00');">
            </div>
                        
            <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>
            <div class="col-md-2">
                <input id="dtnasc" name="dtnasc" class="date" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>


            <div class="form-group">
            <div class="col-md-3">
                    <input type="checkbox" name="liberar" class="port">
                    <label>Portador de necessidades </label>

                    <div class="lib" style="margin-top: 20px;display: none;">

                        <input type="radio" name="opcao" value="visual">
                        <label>visual</label>

                        <input type="radio" name="opcao" value="motora">
                        <label>motora</label>

                        <input type="radio" name="opcao" value="mental">
                        <label>mental</label>

                        <input type="radio" name="opcao" value="auditiva">
                        <label>auditiva</label>
                    </div>
            </div>
        </div>


            <div class="form-group">
                <label class="col-md-2 control-label" for="arquivos">Arquivos</label>
                    <div class="col-md-5 mb-2">
                    <input type="file" name="arquivos" /><br/>
                    </div>
            </div>

        
    



        <div class="form-group">
            <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button  type="submit" id="Cadastrar" name="Cadastrar" class="btn btn-success">Cadastrar</button>
                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                </div>
        </div>

</form>

<?php
require "pages/footer.php";

?>