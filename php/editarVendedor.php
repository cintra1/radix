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

    public function atualizar($idVendedor, $nome, $cpfCnpj, $email, $senha, $imagem, $endereco)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblVendedor SET nome = '$nome', cpfCnpj = '$cpfCnpj',
             email = '$email', senha = '$senha', imagem = '$imagem', endereco = '$endereco'
             WHERE idVendedor = '$idVendedor'");

             $sql->execute();
           
        
    } 
}
    
?>