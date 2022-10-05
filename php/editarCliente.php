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

    public function atualizar($idCliente, $nome, $cpf, $email)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblCliente SET nome = '$nome', cpf = '$cpf',
             email = '$email'
             WHERE idCliente = '$idCliente'");

             $sql->execute();
           
        
    }
}
    
?>