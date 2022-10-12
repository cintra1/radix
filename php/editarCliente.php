<?php

class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
        } catch (Exception $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function atualizar($idCliente, $nome, $cpf, $email)
    {
        global $pdo;

        $sql = $pdo->prepare("UPDATE tblCliente SET nome = '$nome', cpf = '$cpf',
             email = '$email'
             WHERE idCliente = '$idCliente'");

        $sql->execute();
    }

    public function adicionarEndereço($endereco, $apelidoEndereco, $complemento, $numero,
     $enderecoPrincipal, $statusEndereco, $idCliente)
    {
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO tblEndereco (endereco,apelidoEndereco,complemento,numero,
            enderecoPrincipal,statusEndereco,idCliente) 
            VALUES (:n, :p, :f, :d, :e, :i, :s)");

        $sql->bindValue(":n", $endereco);
        $sql->bindValue(":p", $apelidoEndereco);
        $sql->bindValue(":f", $complemento);
        $sql->bindValue(":d", $numero);
        $sql->bindValue(":e", $enderecoPrincipal);
        $sql->bindValue(":i", $statusEndereco);
        $sql->bindValue(":s", $idCliente);

        $sql->execute();
    }

    public function atualizarEndereço($idEndereco, $endereco, $apelidoEndereco, $complemento, $numero)
    {
        global $pdo;

        $sql = $pdo->prepare("UPDATE tblEndereco SET endereco = '$endereco', apelidoEndereco = '$apelidoEndereco',
             complemento = '$complemento', numero = '$numero'
             WHERE idEndereco = '$idEndereco'");

        $sql->execute();
    }
}
