<?php
    if(!isset($_SESSION)){
        session_start();
    }

if(!isset($_SESSION['idCliente'])){
    header("Location: initialNoUser.php");
}
?>