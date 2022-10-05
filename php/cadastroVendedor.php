<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (Exception $e) {
            $msgErro = $e->getMessage();
        }                
    }

    public function cadastrar($nomeVend, $cpfCnpj, $emailVend, $senhaVend, $imagemVend, $enderecoVend, $statusConta)
    {
        global $pdo;
        //verificar se ja existe o email cadastrado
        $sql = $pdo -> prepare("SELECT idVendedor FROM tblVendedor 
            WHERE emailVend = :e");

        $sql->bindValue(":e",$emailVend);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrado
        }
        else
        {
            //caso nao, realizar cadastro
            $sql = $pdo->prepare("INSERT INTO tblVendedor (nomeVend, cpfCnpj, emailVend, senhaVend, imagemVend, enderecoVend, statusConta) 
                VALUES (:n, :t, :e, :s, :i, :d, :st)");
            
             $sql->bindValue(":n",$nomeVend);
             $sql->bindValue(":t",$cpfCnpj);
             $sql->bindValue(":e",$emailVend);
             $sql->bindValue(":s",$senhaVend);
             $sql->bindValue(":i",$imagemVend);
             $sql->bindValue(":d",$enderecoVend);
             $sql->bindValue(":st",$statusConta);
             $sql->execute();
             return true;
        } 
    } 
}
    
?>