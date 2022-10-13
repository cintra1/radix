<?php
    session_start();
    include_once "config.php";
    $idVendedor = $_SESSION['idVendedor'];
    $sql = "SELECT * FROM tblCliente as cli inner join tblConversa as c on cli.idCliente = c.idCliente where c.idVendedor = $idVendedor order by c.idCliente DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Sem clientes disponíveis para conversar.";
    }elseif(mysqli_num_rows($query) > 0){
        include "data.php";
    }
    echo $output;
?>