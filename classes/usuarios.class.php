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

    public function getInfo($cod_inscricao)
    {
        global $pdo;
        $sql = "SELECT  *, TO_CHAR(data, 'DD-MM-YYYY') as dtcad, TO_CHAR(dtnasc, 'DD-MM-YYYY') as dtnascimento  FROM inscricao WHERE cod_inscricao = :cod_inscricao";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':cod_inscricao', $cod_inscricao);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return  $sql->fetch();
        } else {
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

                $id = $pdo->lastInsertId();

                header("Location: user.php?id=".$id);
            } else {
                echo "<p>Falha no Upload!!</p>";
            }
        }
    }
    public function getALL($p, $pagina)
    {
        global $pdo;

        $page = ($p -1) * $pagina;

        $sql = "SELECT * FROM inscricao ORDER BY cod_inscricao DESC LIMIT $pagina OFFSET $page  ";
        $sql = $pdo->query($sql);


        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function getUser($id)
    {
        global $pdo;

        $sql = "SELECT * FROM inscricao WHERE cod_inscricao = ".$id." ";
        $sql = $pdo->query($sql);


        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function Editcadastrar($nome, $cpf, $dtnasc, $opcao, $data, $cod_inscricao)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE inscricao SET nome = :nome,dtnasc =:dtnasc, cpf = :cpf, 
                opcao = :opcao, data = :data WHERE cod_inscricao = :cod_inscricao");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":opcao", $opcao);
        $sql->bindValue(":data", $data);
        $sql->bindValue(":dtnasc", $dtnasc);
        $sql->bindValue(":cod_inscricao", $cod_inscricao);
        $sql->execute();

        header("Location: user.php?id=".$cod_inscricao);
    }

    public function Excluir($cod_inscricao)
    {
        global $pdo;

        $sql = "DELETE FROM inscricao where cod_inscricao = :cod_inscricao";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':cod_inscricao', $cod_inscricao);
        $sql->execute();
    }

    
    public function login($cpf)
    {
        global $pdo;
       
     

        // $sql = $pdo->prepare("SELECT cod_inscricao FROM inscricao WHERE cpf = :cpf ");
        $sql = $pdo->prepare("SELECT cod_inscricao FROM inscricao WHERE cpf = :cpf ");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
          
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['captcha'] = $dado['cod_inscricao'];

            header("Location: user.php?id=".$dado['cod_inscricao']);
        } else {
            header("Location: cadastro.php");
        }
    }

    public function FazerLogin($cpf, $senha)
    {
        var_dump('oi');
        global $pdo;

        $sql = "SELECT * FROM inscricao WHERE cpf = :cpf AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

          
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['clogin'] = $dado['cod_inscricao'];
        

            header("Location: dados.php");
        } else {
            header("Location: cadastro.php");
        }
        
    }
}