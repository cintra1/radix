<?php 

include 'config.php';

$idLembrete = $_POST['idLembrete'];


$sql = "DELETE from tblLembrete where idLembrete = '$idLembrete'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>