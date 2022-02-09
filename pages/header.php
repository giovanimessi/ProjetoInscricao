<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/estilo.css" rel= "Stylesheet">
    <link href="assets/css/bootstrap.min.css" rel= "Stylesheet">

    <title>Syinfo</title>
</head>
<body>
<div class="row" style="margin-top: 20px;">


            <div class="col-lg-1">

            </div>

            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3" style="margin-bottom: 10px; margin-top: 5px; text-align: center;">
                                  <!--  Logo -->
                            </div>

                            <!-- texto ajuda -->
                            <div class="col-lg-9">
                                <h1>Informações?</h1>
                                <p class="descricao-ajuda">O SISTEMA DE INSCRIÇÕES permite aos participantes de eventos receber os valores referentes a prestação de serviços realizados.</p>
                                <p class="descricao-ajuda"><strong>IMPORTANTE:</strong> para o recebimento é imprescindível que os dados pessoais do participante estejam atualizados nos Órgãos Federais. <strong><a target="_blank" href="http://www.uesc.br/transfexterna/index.php?item=conteudo_apresentacao.php" style="text-decoration: none; color: red;">Clique aqui para realizar a consulta</a></strong>, caso haja divergência seguir orientação para regularização, antes da prestação do serviço.</p>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Panel Login -->
                                <div class="panel panel-default" id="divcpf" style="background-color: rgb(245, 245, 245); min-height: 300px;">
                                    <!-- body -->
                                    <div class="panel-body">
                                        <h4 class="panel-title" style="margin-bottom: 15px; text-align: center;">
                                            Identifique-se 
                                        </h4>
                                        <!-- CPF -->
                                        <div class="row" style="margin-bottom: 50px;">
                                            <div class="col-lg-12" style="text-align: center;">
                                                <input type="text" id="txtCPF" class="form-control" name="txtCPF" onchange="clearvalidate(this, $('#lblValidarCPF'))" onfocus="clearvalidate(this, $('#lblValidarCPF'))" onblur="clearvalidate(this, $('#lblValidarCPF'))" placeholder="Insira seu CPF">
                                                <span class="validacao" id="lblValidarCPF"></span>
                                                <button type="button" onclick="CPF();" class="btn btn-default" id="btnCPF" style="width: 100%; background-color: orange; border-color: #4d90fe; background: orange; color:white; margin-top: 5px; ">Continuar</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel Senha -->
                                <div class="panel panel-default" id="divsenha" style="background-color: red; width: 350px; min-height: 300px; display: none;">


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
                                                <img class="img-responsive img-circle" src="/sisins/Content/images/userblue.png">
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

                                        <!-- captcha -->
                                      
                                         <!-- /captcha -->
                                        <!-- Esqueceu a senha -->
                                        <div class="row" style="margin-bottom: 50px;">
                                            <div class="col-lg-12" style="text-align:right; margin-top: 10px; margin-right: 5px; ">
                                                <a href="/sisins/Login/Esqueci">Esqueceu a senha?</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- / Panel Login -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

