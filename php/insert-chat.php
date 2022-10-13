<?php 
    session_start();
    if(isset($_SESSION['idVendedor'])){
        include_once "config.php";
        $idConversa = mysqli_real_escape_string($conn, $_POST['idConversa']);
        $msg = mysqli_real_escape_string($conn, $_POST['msg']);
        if(!empty($msg)){
            $sql = mysqli_query($conn, "INSERT INTO tblMsgVendedor (msg,msgData,idConversa)
                                        VALUES ('{$msg}', NOW(), {$idConversa})") or die();
        }
    }else{
        header("location: ../login.php");
    }
    
?>