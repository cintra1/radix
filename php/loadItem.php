<?php

require('connection.php');

$idCliente = $_SESSION['idCliente'];

$sql = $pdo->query("SELECT * from tblItem where idCliente = '$idCliente'");
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $value) {
        $idProduto = $value['idProduto'];
        
        $sql2 = $pdo->query("SELECT v.idVendedor from tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor inner join tblItem as i on p.idProduto = i.idProduto where p.idProduto = $idProduto");
        if ($sql2->rowCount() > 0) {
            foreach ($sql2->fetchAll() as $value2) {
            }
        }
    }
}
