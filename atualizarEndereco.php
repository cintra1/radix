<?php
include("php/conexao.php");
require('php/connection.php');

if(!isset($_SESSION)){
        session_start();
      }

$idEndereco = $_GET['idEndereco'];
$idCliente = $_SESSION['idCliente'];

if (isset($_GET['idEndereco'])) {

        $delete2 = $pdo->prepare("
            UPDATE tblEndereco set enderecoPrincipal = 0 where idCliente = $idCliente;");

        $delete = $pdo->prepare("
            UPDATE tblEndereco set enderecoPrincipal = 1 where idEndereco = $idEndereco;");

        $delete2->execute();
        $delete->execute();

        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=perfilCliente.php"/>';
}
