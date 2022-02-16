<?php
require 'pages/header.php';
require 'config.php';
require 'classes/usuarios.class.php';
$u = new Usuarios();

if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {

    $op = !isset($_POST['opcao']) ? null : $_POST['opcao'];

    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $dtnasc = addslashes($_POST['dtnasc']);
    $opcao = addslashes($op);
    $data = addslashes($_POST['data']);


    $u->Editcadastrar($nome, $cpf, $dtnasc, $opcao, $data,$_GET['cod_inscricao']);

}

if (!empty($_GET['cod_inscricao'])) {
    $cod_inscricao = addslashes($_GET['cod_inscricao']);

    $info = $u->getInfo($cod_inscricao);

}

?>

<form  method="POST"  enctype="multipart/form-data" id="validator" class="form-horizontal">

        <div class="panel panel-primary">
            <div class="panel-heading">Inscrição - Edição </div>


            <div class="panel-body">
        <div class="form-group">
            <div class="col-md-11 control-label">
                    <a href="sair.php" class="btn btn-primary">Sair</a>
                    <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">  <h11></h11></label>
            <div class="col-md-8">
           <input type="hidden" value="<?php echo $info['cod_inscricao']; ?>">
            </div>
        </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="data">Data do Cadastro<h11>*</h11></label>
                        <div class="col-md-2">
                            <input id="dtn" name="data" class="date" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" value="<?php echo $info['data']; ?>">
                        </div>
            </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">Nome Completo  <h11>*</h11></label>
            <div class="col-md-8">
            <input type="text" name="nome" class="form-control input-md" data-rules="min=2" required="" value="<?php echo $info['nome']; ?>"/>
            </div>
        </div>

            <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>
            <div class="col-md-2">
            <input type="text" id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" maxlength="14"
             Onkeypress="$(this).mask('000.000.000-00');" value="<?php echo $info['cpf']; ?>"/>
            </div>
            <label class="col-md-2 control-label" for="Nome">Data de Nascimento<h11>*</h11></label>
            <div class="col-md-2">
                <input id="dtnasc" name="dtnasc" class="date" placeholder="DD/MM/AAAA"
                class="form-control input-md" required="" type="date"
                maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" value="<?php echo $info['dtnasc']; ?>"/>
            </div>


            <div class="form-group">
            <div class="col-md-3">
                    <input type="checkbox" name="liberar" class="port">
                    <label>Portador de necessidades </label>

                    <div class="lib" style="margin-top: 20px;display: none;">

                        <input type="radio" name="opcao" value="visual" class="visual op" value="<?php echo $info['opcao']; ?>"/>
                        <label>visual</label>

                        <input type="radio" name="opcao" value="motora" class="motora op" value="<?php echo $info['opcao']; ?>"/>
                        <label>motora</label>

                        <input type="radio" name="opcao" value="mental" class="mental op" value="<?php echo $info['opcao']; ?>"/>
                        <label>mental</label>

                        <input type="radio" name="opcao" value="auditiva" class="auditiva op" value="<?php echo $info['opcao']; ?>"/>
                        <label>auditiva</label>
                    </div>
            </div>
         
        </div>

          

        <div class="form-group">
            <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button  type="submit" id="Cadastrar" name="editar" class="btn btn-success">Salvar</button>
                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                </div>
        </div>

</form>

<?php
require "pages/footer.php";

?>
<script>
$(document).ready(function(){

    const opcao = "<?=$info['opcao']?>";
    if(opcao !=''){
        $(".lib").show();
        $(".port").attr("checked","checked")
        $("."+opcao).attr("checked","checked")
    }

    $(".port").click(function(){

        var checkbox = $(this).is(":checked");

        if (checkbox) {
            $(".lib").show();
        }else{
            $(".lib").hide();
            $(".op").each(function(i,v){
                v.checked = false
            })
        }

    });


})
</script>