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

    public function cadastrar($dia, $descricao, $valor, $conta, $situacao, $idAdm)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblDespesas (dia, descricao, valor, conta, situacao, idAdm) 
                VALUES (:n, :p, :f, :d, :i, :s)");
            
             $sql->bindValue(":n",$dia);
             $sql->bindValue(":p",$descricao);
             $sql->bindValue(":f",$valor);
             $sql->bindValue(":d",$conta);
             $sql->bindValue(":i",$situacao);
             $sql->bindValue(":s",$idAdm);

             $sql->execute();
           
    } 
}
    
?>