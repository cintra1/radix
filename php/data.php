<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * from tblmsgCliente where idConversa = {$row['idConversa']}  order by msgData DESC;";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="Sem mensagens do Cliente...";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['idVendedor'])){
            ($idVendedor == $row2['idVendedor']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        
       

        $output .= '<a href="chat.php?idCliente='. $row['idCliente'] .'&idConversa='. $row['idConversa'] .'">
                    <div class="content">
                    <div class="details">
                        <span>'. $row['nome'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                </a>';
    }
?>