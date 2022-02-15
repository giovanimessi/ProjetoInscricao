<?php

class Usuarios
{
    public function getTotalInscritos()
    {
        global $pdo;

        $sql = $pdo->query("SELECT COUNT(*) as c FROM inscricao");
        $row = $sql->fetch();

      
    
        return $row['c'];
    }

    public function getInfo($cod_inscricao){
          global $pdo;
        $sql = "SELECT  *, TO_CHAR(data, 'DD-MM-YYYY') as dtcad, TO_CHAR(dtnasc, 'DD-MM-YYYY') as dtnascimento  FROM inscricao WHERE cod_inscricao = :cod_inscricao";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':cod_inscricao' ,$cod_inscricao);
        $sql->execute();

        if ($sql->rowCount() > 0) {
          return  $sql->fetch();
      }else{
        return array();
      }

    }
    public function cadastrar($nome, $cpf, $dtnasc, $opcao, $data, $arquivos)
    {
        global $pdo;


        if (isset($_FILES['arquivos'])) {
            $arquivos = $_FILES['arquivos'];


            if ($arquivos['error']) {
                die("Falha no envio do upload");
            }
            if ($arquivos['size'] > 2097153) {
                die("Arquivo grande upload!! max 2mb");
            }
            $pasta = "assets/uploads/";

            $nomedoArquivo = $arquivos['name'];


            $novonome = uniqid();
            $extensao = strtolower(pathinfo($nomedoArquivo, PATHINFO_EXTENSION));
    

            if ($extensao != 'pdf') {
                die("Tipo de arquivo não aceito");
            }

            $path =  $pasta.$nomedoArquivo.".".$extensao;
            


            $sucesso = move_uploaded_file($arquivos['tmp_name'], $path);

            if ($sucesso) {
                $sql = 'INSERT INTO inscricao (nome,  cpf, dtnasc, opcao, data, arquivos)
                    VALUES(:nome,  :cpf, :dtnasc, :opcao, :data, :arquivos)';
                $sql = $pdo->prepare($sql);
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":dtnasc", $dtnasc);
                $sql->bindValue(":opcao", $opcao);
                $sql->bindValue(":cpf", $cpf);
                $sql->bindValue(":data", $data);
                $sql->bindValue(":arquivos", $path);
                $sql->execute();
            } else {
                echo "<p>Falha no Upload!!</p>";
            }
        }
    }
    public function getALL($page, $perPage)
    {
        global $pdo;

        $page = ($page -1) * $perPage;
       

     
        $sql = "SELECT * FROM inscricao ORDER BY cod_inscricao DESC LIMIT 5";
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function Excluir($cod_inscricao){
      global $pdo;

        $sql = "DELETE FROM inscricao where cod_inscricao = :cod_inscricao";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':cod_inscricao',$cod_inscricao);
        $sql->execute();


    }
    

}