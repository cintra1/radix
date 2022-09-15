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

    public function cadastrar($nome, $detalhe, $num)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblCupom (nome, detalhe, num) 
                VALUES (:n, :p, :f)");
            
             $sql->bindValue(":n",$nome);
             $sql->bindValue(":p",$detalhe);
             $sql->bindValue(":f",$num);

             $sql->execute();
           
    } 
}
    
?>