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

    public function adicionar($msg, $idConversa)
    {
        global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO tblMsgVendedor (msg,msgData,idConversa) 
                VALUES (:n, NOW(), :f)");
             $sql->bindValue(":n",$msg);
             $sql->bindValue(":f",$idConversa);

             $sql->execute();
           
    } 
}
    
?>