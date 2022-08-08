<?php 

include 'conexao.php';

$task = $_POST['task'];

$sql = "INSERT INTO tblLembrete (titulo) VALUES ('$task')";
$result = mysqli_query($mysqli, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>