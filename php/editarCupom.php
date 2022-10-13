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

    public function atualizar($idCupom, $nomeCupom, $detalhe, $num)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblCupom SET nomeCupom = '$nomeCupom', detalhe = '$detalhe',
             num = '$num', detalhe = '$detalhe'
             WHERE idCupom = '$idCupom'");

             $sql->execute();
           
        
    } 

    public function deletar($idCupom)
    {
        global $pdo;
      
            $sql = $pdo->prepare("DELETE from tblCupom where idCupom = $idCupom;");
             $sql->execute();
           
        
    } 
}
    
?>