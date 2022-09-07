<?php 

require('connection.php');

$idLembrete = $_GET['idLembrete']; 

$sql = $pdo->query("SELECT * from tblLembrete where idLembrete = '$idLembrete'");
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $value){
    }
}


?>