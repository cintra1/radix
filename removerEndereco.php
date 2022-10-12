<?php
include("php/conexao.php");
require('php/connection.php');

$idEndereco = $_GET['idEndereco'];

if(isset($_GET['idEndereco'])){
            $delete = $pdo->prepare("
            UPDATE tblEndereco set statusEndereco = 0, enderecoPrincipal = 0 where idEndereco = $idEndereco;");
            $delete->execute();
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=perfilCliente.php"/>';
}
        ?>
