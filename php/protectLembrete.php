<?php
    if(!isset($_SESSION)){
        session_start();
    }

if(!isset($_SESSION['idADM'])){
    die("Você não pode acessar essa página porque você não está logado.<P><a href=\"login.php\">Entrar</a></P>");
    
}
?>