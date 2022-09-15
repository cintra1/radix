<?php 

include 'conexao.php';

$sql = "SELECT * FROM tblCupom";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {

?>

<li>
    <span class="text"><?php echo $row['num']; ?></span>
   
</li>

<?php
}
    echo '<div class="pending-text">You have ' . mysqli_num_rows($result) . ' pending tasks.</div>';
} else {
    echo "<li><span class='text'>No Record Found.</span></li>";
}

?>