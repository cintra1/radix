<?php 

include 'conexao.php';

$nome = $_POST['nome'];
$detalhe = $_POST['detalhe'];
$num = $_POST['num'];


$sql = "INSERT INTO tblCupom (nome,detalhe,num) VALUES ('$nome','$detalhe','$num')";
$result = mysqli_query($mysqli, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>