<?php 

include 'conexao.php';

$sql = "SELECT * FROM tblLembrete";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {}
} 
?>