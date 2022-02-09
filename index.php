<?php
require 'config.php';
require 'pages/header.php';

?>
<div class="row" style="margin-top: 20px;">

<div class="col-lg-1">

</div>


<!--Coluna 2 -->
<div class="col-lg-10">
<!-- Logotipo -->
<div class="row" style=" margin-bottom: 10px;">
</div>

<div class="row">

<div class="col-lg-7">
<div class="row">

<!--  Logo -->
<div class="col-lg-3" style="margin-bottom: 10px; margin-top: 5px; text-align: center;">
</div>

<!-- texto ajuda -->
        <div class="col-lg-9">
        <h1>Informções?</h1>
        <p class="descricao-ajuda">.</p>
        <p class="descricao-ajuda">Para isso os participantes devem realizar o cadastro de acesso ao sistema</p>
        <p class="descricao-ajuda"><strong>IMPORTANTE:</strong> para o recebimento é imprescindível que os dados. <strong><a target="_blank" href="http://www.uesc.br/transfexterna/index.php?item=conteudo_apresentacao.phpl" style="text-decoration: none; color: red;">Clique aqui para realizar a consulta</a></strong>, caso haja divergência seguir orientação para regularização, antes da prestação do serviço.</p>
        </div>

</div>

</div>
<!-- / Coluna 1 - Layout 1 -->

<!-- Coluna 2 - Layout 1 -->
<div class="col-lg-5">

<div class="row">

<div class="col-lg-12">

<!-- Panel Login -->
<div class="panel panel-default" id="divcpf" style="background-color: rgb(245, 245, 245); min-height: 300px;">


<!-- body -->
<div class="panel-body">

<div class="panel-body">
<div class="rightside">
<h1> INSCRIÇÕES</h1>

    <form method="POST" action="cadastro.php" class="validator">
    <label>
    CPF:<br/>
    <input type="text" name="textCpf" data-rules="min=14" />
    </label>

    <label>
    <input type="submit" value="Captchar" />
    </label>
    </form>
<div>
<a href="#" >Faça</a>
</div>
</div>


</div>

</div>
<!-- / Panel Login -->


<!-- Panel Senha -->
<div class="panel panel-default" id="divsenha" style="background-color: #f5f5f5; width: 350px; min-height: 300px; display: none;">


<!-- body -->
<div class="panel-body">

<!-- voltar -->
<div class="row">
<div class="col-lg-12">
<a href="javascript:void(0);" onclick="Voltar();" style="text-decoration: none; color: gray;"><i class="fa fa-arrow-circle-o-left fa-3x" aria-hidden="true"></i></a>
</div>
</div>

<!-- logo user -->
<div class="row" style="margin-bottom: 10px;">
<div class="col-lg-4">

    </div>
            <div class="col-lg-4" style="text-align: center; padding: 15px;">
            </div>
    <div class="col-lg-4">

</div>
</div>

<!-- CPF -->
<div class="row">
<div class="col-lg-12" style="text-align:center; margin-top: 5px; margin-bottom: 5px;">
<span id="lblCPF" class="login-cpf"></span>
</div>
</div>

<!-- Senha -->
<div class="row">
<div class="col-lg-12" style="text-align: center;">
<input type="password" id="txtSenha" class="form-control" name="txtSenha" placeholder="Insira sua senha" onchange="clearvalidate(this, $('#lblValidarSenha'))" onfocus="    clearvalidate(this, $('#lblValidarSenha'))" onblur="clearvalidate(this, $('#lblValidarSenha'))">
<span class="validacao" id="lblValidarSenha"></span>
<button type="button" onclick="Validate();" class="btn btn-default" id="btnSenha" style="width: 100%; background-color: #4d90fe; border-color: #4d90fe; background: #4d90fe; color:white; margin-top: 5px; ">Continuar</button>
</div>
</div>

<!-- Esqueceu a senha -->
<div class="row" style="margin-bottom: 50px;">
<div class="col-lg-12" style="text-align:right; margin-top: 10px; margin-right: 5px; ">
</div>
</div>

</div>

</div>


</div>
</div>
</div>
</div>
</div>


</div>



<?php
require "pages/footer.php";

?>