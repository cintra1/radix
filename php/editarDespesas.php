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

    public function atualizar($idDespesas, $descricao, $valor, $dia, $conta,  $situacao)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblDespesas SET descricao = '$descricao', valor = '$valor',
             dia = '$dia', conta = '$conta', situacao = '$situacao'
             WHERE idDespesas = '$idDespesas'");

             $sql->execute();
           
        
    } 

    public function deletar($idLembrete)
    {
        global $pdo;
      
            $sql = $pdo->prepare("DELETE FROM tblLembrete WHERE idLembrete = $idLembrete");

             $sql->execute();
           
        
    } 
}
    
?>