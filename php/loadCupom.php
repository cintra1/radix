<?php 

require('connection.php');

$idCupom = $_GET['idCupom']; 

$sql = $pdo->query("SELECT * from tblCupom where idCupom = '$idCupom'");
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $value){
    }
}


?>