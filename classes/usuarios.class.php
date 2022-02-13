<?php

class Usuarios
{
    public function cadastrar($nome, $cpf, $dtnasc, $opcao, $data, $arquivos)
    {
        global $pdo;
        $sql = 'INSERT INTO inscricao (nome,  cpf, dtnasc, opcao, data)
        VALUES(:nome,  :cpf, :dtnasc, :opcao, :data)';
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":dtnasc", $dtnasc);
        $sql->bindValue(":opcao", $opcao);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":data", $data);
        $sql->execute();


        
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

                global $pdo;
                $sql = 'INSERT INTO inscricao (arquivos)
                 VALUES(:arquivos)';
                 $sql = $pdo->prepare($sql);
                $sql->bindValue(":arquivos", $path);
                $sql->execute();
            } else {
                echo "<p>Falha no Upload!!</p>";
            }
        }
    }
    
}



