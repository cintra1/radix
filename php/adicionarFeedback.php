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

    public function cadastrar($feedback, $idCliente)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblFeedback (feedback, idCliente) 
                VALUES (:f, :p)");
            
             $sql->bindValue(":f",$feedback);
             $sql->bindValue(":p",$idCliente);

             $sql->execute();
           
    } 

    public function cadastrarCupom($nomeCupom, $detalhe, $num, $idCliente)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblCupom (nomeCupom, detalhe, num, idCliente) 
                VALUES (:n, :p, :f, :d)");
            
             $sql->bindValue(":n",$nomeCupom);
             $sql->bindValue(":p",$detalhe);
             $sql->bindValue(":f",$num);
             $sql->bindValue(":d",$idCliente);

             $sql->execute();
           
    } 
}
    
?>