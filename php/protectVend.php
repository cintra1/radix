<?php
    if(!isset($_SESSION)){
        session_start();
    }

if(!isset($_SESSION['idVendedor'])){
    die("Você não pode acessar essa página porque você não está logado.<P><a href=\"loginVendedor.php\">Entrar</a></P>");
    
}
?>