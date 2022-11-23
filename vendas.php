<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectAdm.php');

$consulta = "SELECT * from tblVendedor;";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesVend.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <title>Radix</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container3">
            <a id="radix" href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>


            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

            <a href="php/logout.php" class="button button__header">LOGOUT</a>
        </nav>
    </header>

    <div class="caixa__grande">
        <div class="perfil">
            <h1 class="title" style="white-space: nowrap;"><a href="indexAdm.php" style="color: #70C28D;">Aréa De Admnistração </a> > Vendedores Ativos</h1>
        </div>
       

        <div class="home__container container grid2 box row">
            <?php if ($con->rowCount() > 0) {
                while ($dado = $conn->fetch_array()) { ?>
                    <div class="home__box home__container container">
                        <div class="fist">
                            <div class="box__circle">
                                
                                
                               <?php 
                                $idVendedor = $dado['idVendedor'];
                                $consultaVe = "SELECT count(*) as entrega from tblEntrega where idVendedor = $idVendedor;";

                                $connVe = $mysqli->query($consultaVe) or die($mysqli->error);

                                ?>
                              
                                <?php while ($dado5 = $connVe->fetch_array()) {
                                   if($dado5['entrega'] == 0){  ?>
                                <img src="assets/img/semente.png" alt="" >

                   

                                <?php }else if($dado5['entrega'] <= 3){ ?>

                                    <img src="assets/img/folha.png" alt="" >

                      
                                <?php }else if($dado5['entrega'] > 3){ ?>
                                    <img src="assets/img/tree.png" alt="" >

                   
                                    <?php }}?>
                      
                            </div>
                            <div class="home__data">
                                <h1 class="home__titlet"><?php echo $dado['nomeVend']; ?></h1>
                                <p class="home__description">Vendedor</p>
                            </div>
                        </div>
                        <div class="box__vendas">
                            <div>
                                <p class="title__vendas">Vendas: </p>
                                <h2><?php
                                    $idVendedor = $dado['idVendedor'];
                                    $soma = "SELECT count(idEntrega) as vendas from tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto inner join tblVendedor as v on p.idVendedor = v.idVendedor where v.idVendedor = $idVendedor;";
                                    $s = $mysqli->query($soma) or die($mysqli->error);
                                    while ($dado2 = $s->fetch_array()) {
                                        echo $dado2['vendas']; ?> <?php } ?> </h2>
                            </div>

                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>