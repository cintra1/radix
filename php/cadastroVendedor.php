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

    public function cadastrar($nome, $cpfCnpj, $email, $senha, $imagem, $endereco, $statusConta)
    {
        global $pdo;
        //verificar se ja existe o email cadastrado
        $sql = $pdo -> prepare("SELECT idVendedor FROM tblVendedor 
            WHERE email = :e");

        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrado
        }
        else
        {
            //caso nao, realizar cadastro
            $sql = $pdo->prepare("INSERT INTO tblVendedor (nome, cpfCnpj, email, senha, imagem, endereco, statusConta) 
                VALUES (:n, :t, :e, :s, :i, :d, :st)");
            
             $sql->bindValue(":n",$nome);
             $sql->bindValue(":t",$cpfCnpj);
             $sql->bindValue(":e",$email);
             $sql->bindValue(":s",$senha);
             $sql->bindValue(":i",$imagem);
             $sql->bindValue(":d",$endereco);
             $sql->bindValue(":st",$statusConta);
             $sql->execute();
             return true;
        } 
    } 
}
    
?>