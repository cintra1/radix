<?php

if (isset($_SESSION['idVendedor'])) {
    include_once "config.php";
    include_once "connection.php";

    $idVendedor = $_SESSION['idVendedor'];

    $idConversa = $_GET['idConversa'];

    $output = "";
    $sql = "SELECT * from tblConversa as c inner join tblmsgcliente as mc where c.idConversa = $idConversa  UNION
        select * from tblConversa as c inner join tblmsgVendedor as mc where c.idConversa =  $idConversa  order by msgData ASC;
        ";

        $sqlC = "SELECT * from tblConversa as c inner join tblmsgcliente where c.idConversa =  $idConversa ;
        ";

        $sqlV = "SELECT * from tblConversa as c inner join tblmsgVendedor where c.idConversa =  $idConversa ;
        ";

    $conC = $pdo->query($sqlC) or die($mysqli->error);
    $conV = $pdo->query($sqlV) or die($mysqli->error);
    $query = mysqli_query($conn, $sql);

    if ($conC->rowCount() > 0 || $conV->rowCount() > 0) {
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {

            $sql2 = "SELECT  distinct * from tblMsgVendedor as mv inner join tblConversa as c on mv.idConversa = c.idConversa where msgData = '{$row['msgData']}' and c.idConversa =  $idConversa";
            $con2 = $pdo->query($sql2) or die($mysqli->error);
            $query2 = mysqli_query($conn, $sql2);

            $sql3 = "SELECT  distinct * from tblMsgCliente as mc inner join tblConversa as c on mc.idConversa = c.idConversa where msgData = '{$row['msgData']}' and c.idConversa =  $idConversa";
            $con3 = $pdo->query($sql3) or die($mysqli->error);
            $query3 = mysqli_query($conn, $sql3);

            while ($row2 = mysqli_fetch_assoc($query2)) {
                if ($con2->rowCount() > 0 ) {

                   
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row2['msg'] . '</p>
                                </div>
                                </div>';
                 
                   
                    }}
                    while ($row3 = mysqli_fetch_assoc($query3)) {

                    if ($con3->rowCount() > 0) {
                        $output .= '<div class="chat incoming">
                        <div class="details">
                            <p>' . $row3['msg'] . '</p>
                        </div>
                        </div>';
                    }}
            
        }
    } }else {
        $output .= '<div class="text">O Cliente não enviou nenhuma mensagem.</div>';
    }
    echo $output;
}
