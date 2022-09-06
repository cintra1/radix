<?php 

require('connection.php');

$idProduto = $_GET['idProduto']; 

$sql = $pdo->query("SELECT * from tblProduto where idProduto = '$idProduto'");
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $value){
    }
}


?>