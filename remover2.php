<?php
include("php/conexao.php");
require('php/connection.php');

$idItem = $_GET['idItem'];

if(isset($_GET['idItem'])){
            $delete = $pdo->prepare("
            UPDATE tblItem set statusItem = 0 where idItem = $idItem;");
            $delete->execute();
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrinho.php"/>';
}
        ?>
