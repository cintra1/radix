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

    public function cadastrar($idVendedor, $valorConta)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblConta (idVendedor,valorConta) 
                VALUES (:n, :p)");
            
             $sql->bindValue(":n",$idVendedor);
             $sql->bindValue(":p",$valorConta);

             $sql->execute();
           
    } 
}
    
?>