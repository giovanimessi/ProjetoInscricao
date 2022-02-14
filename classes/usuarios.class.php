<?php

class Usuarios
{
    public function cadastrar($nome, $cpf, $dtnasc, $opcao, $data, $arquivos)
    {
        global $pdo;
       

        if(isset($_FILES['arquivos'])){


            $arquivos = $_FILES['arquivos'];


            if($arquivos['error']){

                die("Falha no envio do upload");

            }
            if($arquivos['size'] > 2097153){

                die("Arquivo grande upload!! max 2mb");

            }
            $pasta = "assets/uploads/";

            $nomedoArquivo = $arquivos['name'];


            $novonome = uniqid();
            $extensao = strtolower(pathinfo($nomedoArquivo,PATHINFO_EXTENSION));


            if($extensao != 'pdf')
                die("Tipo de arquivo não aceito");

               $path =  $pasta.$nomedoArquivo.".".$extensao;


                $sucesso = move_uploaded_file($arquivos['tmp_name'],$path);

                if ($sucesso) {
                    $sql = 'INSERT INTO inscricao (nome,  cpf, dtnasc, opcao, data, arquivos)
                    VALUES(:nome,  :cpf, :dtnasc, :opcao, :data, :arquivos)';
                    $sql = $pdo->prepare($sql);
                    $sql->bindValue(":nome", $nome);
                    $sql->bindValue(":dtnasc", $dtnasc);
                    $sql->bindValue(":opcao", $opcao);
                    $sql->bindValue(":cpf", $cpf);
                    $sql->bindValue(":data", $data);
                    $sql->bindValue(":arquivos", $arquivos['name']);
                    $sql->execute();

                }else{
                    echo "<p>Falha no Upload!!</p>";
                }
         }
    }
    public function getALL(){
        global $pdo;

     
        $sql = "SELECT * FROM inscricao ORDER BY cod_inscricao DESC LIMIT 5";
        $sql = $pdo->query($sql);
  
        if($sql->rowCount() > 0){
          return $sql->fetchAll();
        }else{
          return array();
        }
  
      }
    
}



