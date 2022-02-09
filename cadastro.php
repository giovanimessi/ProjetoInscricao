<?php
require 'pages/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- PAnel Group -->
            <div class="panel-group" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <!-- Panel Conteudo -->
                    <div id="pnlConteudo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="pnlCabecalho">
                        <div class="panel-body">
                            <div class="alert alert-danger" style="display: none;" id="divmensagem"></div>
                                <!-- Formulário de Cadastro -->
                                <form method="POST" name="frmCadastrar" id="frmCadastrar" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2><i class="fa fa-user" aria-hidden="true" style="margin-right: 10px;"></i> Usuário Não Cadastrado</h2>
                                            <p>Não conseguimos identifica-lo, por favor realize o cadastro no sistema para ter acesso a inscrição de eventos.</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="txtCPF">CPF <span class="validacao">(*)</label>
                                                        <input type="text" class="form-control" id="txtCPF" name="cpf" placeholder="Insira seu CPF" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="txtNome">Nome Completo <span class="validacao">(*)</span></label>
                                                        <input type="text" id="txtNome" style="text-transform:uppercase" maxlength="255" name="txtNome" class="form-control"  placeholder="Insira seu nome completo">

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="txtDataNascimento">Data de Nascimento <span class="validacao">(*)</span></label>
                                                        <input type="text" id="txtDataNascimento" name="datadeNascimento" class="form-control" style="text-transform:uppercase" placeholder="dd/mm/aaaa">

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    <input type="checkbox" name="liberar" class="port">
                                                     <label>Portador de necessidades </label>



                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label for="arquivos">Arquivos</label>
			                                         <input type="file" name="arquivos" multiple /><br/>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <a href="javascript:void(0);" onclick="validate();" class="btn btn-success" id="btnCadastrar">Cadastrar </a>
                                                <a href="/www/php/sysinfo/" id="btnSair" class="btn btn-warning">Sair</a>
                                                <a href="/www/php/sysinfo/" id="btnvia" class="btn btn-primary">2ª via da Inscrição</a>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <!-- Panel Conteudo -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "pages/footer.php";

?>