<?php 

require('connection.php');

$idDespesas = $_GET['idDespesas']; 

$sql = $pdo->query("SELECT * from tblDespesas where idDespesas = '$idDespesas'");
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $value){
    }
}


?>