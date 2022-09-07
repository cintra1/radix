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

    public function atualizar($idLembrete, $titulo, $criador, $data, $requisitados,  $statusLembrete)
    {
        global $pdo;
      
            $sql = $pdo->prepare("UPDATE tblLembrete SET titulo = '$titulo', criador = '$criador',
             data = '$data', requisitados = '$requisitados', statusLembrete = '$statusLembrete'
             WHERE idLembrete = '$idLembrete'");

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