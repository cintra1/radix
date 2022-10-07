<?php
include("php/conexao.php");
require('php/connection.php');

$idEntrega = $_GET['idEntrega'];

if(isset($_GET['idEntrega'])){
            $delete = $pdo->prepare("
            UPDATE tblEntrega set statusEntrega = 0 where idEntrega = $idEntrega;");
            $delete->execute();
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=pedidos.php"/>';
}
        ?>
