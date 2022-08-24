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

    public function cadastrar($nome, $preco, $foto, $detalhe, $idVendedor)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblProduto (nome, preco, foto, detalhe, idVendedor) 
                VALUES (:n, :p, :f, :d, :i)");
            
             $sql->bindValue(":n",$nome);
             $sql->bindValue(":p",$preco);
             $sql->bindValue(":f",$foto);
             $sql->bindValue(":d",$detalhe);
             $sql->bindValue(":i",$idVendedor);

             $sql->execute();
           
    } 
}
    
?>