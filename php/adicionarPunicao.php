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

    public function envioPun($idVendedor, $tipo, $motivo, $assunto)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblPunicao(idVendedor, tipo, motivo, assunto) 
                VALUES (:id,:t, :m, :a)");
                
             $sql->bindValue(":id",$idVendedor);
             $sql->bindValue(":t",$tipo);
             $sql->bindValue(":m",$motivo);
             $sql->bindValue(":a",$assunto);
            
             $sql->execute();
           
    } 

    public function status($idVendedor)
    {
        global $pdo;
            
            $sql = $pdo->prepare("UPDATE tblVendedor
            SET statusConta = 0 WHERE idVendedor = :id " );

            $sql->bindValue(":id",$idVendedor);
            $sql->execute();
           
    } 
}
    
?>