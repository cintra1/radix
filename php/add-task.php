<?php 

include 'conexao.php';

$task = $_POST['task'];
$criador = $_POST['criador'];
$data = $_POST['data'];
$requisitados = $_POST['requisitados'];
$statusLembrete = $_POST['statusLembrete'];


$sql = "INSERT INTO tblLembrete (titulo,criador,data,requisitados,statusLembrete) VALUES ('$task','$criador','$data',
'$requisitados','$statusLembrete')";
$result = mysqli_query($mysqli, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>