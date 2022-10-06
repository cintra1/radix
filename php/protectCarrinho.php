<?php
    if(!isset($_SESSION)){
        session_start();
    }

if(!isset($_GET['idCupom'])){
    header("Location: carrinho.php?idCupom=0&subCupom=#");
}
?>