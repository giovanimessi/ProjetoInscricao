<?php

class Usuarios
{
    public function cadastrar($cpf, $nome, $dtnasc, $opcao)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT cod_inscricao FROM inscricao WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO inscricao SET cpf = :cpf, nome = :nome, opcao = :opcao, dtnasc = :dtnasc");
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":dtnasc", $dtnasc);
            $sql->bindValue(":opcao", $opcao);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }
}
    ?>