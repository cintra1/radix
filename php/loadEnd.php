<?php

require('connection.php');

$idEndereco = $_GET['idEndereco'];

$sql = $pdo->query("SELECT * from tblEndereco where idEndereco = '$idEndereco'");
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $valueEnd) {
       
    }
}
