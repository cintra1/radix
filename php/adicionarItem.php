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

    public function cadastrar($qtde, $idProduto, $idCliente, $statusItem)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblItem (qtde, idProduto, idCliente, statusItem) 
                VALUES (:n, :p, :f, :d)");
            
             $sql->bindValue(":n",$qtde);
             $sql->bindValue(":p",$idProduto);
             $sql->bindValue(":f",$idCliente);
             $sql->bindValue(":d",$statusItem);

             $sql->execute();
           
    } 
}
    
?>