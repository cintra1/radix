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

    public function cadastrar($nomeProd, $preco, $foto, $detalhe, $idVendedor, $statusProduto)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblProduto (nomeProd, preco, foto, detalhe, idVendedor, statusProduto) 
                VALUES (:n, :p, :f, :d, :i, :s)");
            
             $sql->bindValue(":n",$nomeProd);
             $sql->bindValue(":p",$preco);
             $sql->bindValue(":f",$foto);
             $sql->bindValue(":d",$detalhe);
             $sql->bindValue(":i",$idVendedor);
             $sql->bindValue(":s",$statusProduto);

             $sql->execute();
           
    } 
}
    
?>