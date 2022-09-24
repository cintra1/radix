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

    public function atualizar($idProduto, $nomeProd, $preco, $foto, $detalhe)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblProduto SET nomeProd = '$nomeProd', preco = '$preco',
             foto = '$foto', detalhe = '$detalhe'
             WHERE idProduto = '$idProduto'");

             $sql->execute();
           
        
    } 

    public function deletar($idProduto, $statusProduto)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblProduto SET statusProduto = $statusProduto
             WHERE idProduto = '$idProduto'");

             $sql->execute();
           
        
    } 
}
    
?>