<?php 

include 'conexao.php';

$sql = "SELECT * FROM tblLembrete";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
       
?>

<li > 
    <span class="text" ><?php echo $row['titulo']; ?> </span>
    <i id="removeBtn" class="icon fa fa-trash"></i>
    <input type="hidden" id="delete"  data-id="<?php echo $row['idLembrete']; ?>">
</li>


<?php

    }
    echo '
    <div class="pending-text">Você tem ' . mysqli_num_rows($result) . ' tarefas pendentes.</div>';
} else {
    echo "<li><span class='text'>Sem tarefas.</span></li>";
}

?>