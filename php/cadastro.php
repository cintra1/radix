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

    public function cadastrar($nome, $cpf, $email, $senha)
    {
        global $pdo;
        //verificar se ja existe o email cadastrado
        $sql = $pdo -> prepare("SELECT idCliente FROM tblCliente 
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
            $sql = $pdo->prepare("INSERT INTO tblCliente (nome, cpf, email, senha) 
                VALUES (:n, :t, :e, :s)");
            
             $sql->bindValue(":n",$nome);
             $sql->bindValue(":t",$cpf);
             $sql->bindValue(":e",$email);
             $sql->bindValue(":s",$senha);
             $sql->execute();
             return true;
        } 
    } 
}
    
?>